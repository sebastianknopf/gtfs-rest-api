# GTFS REST API
A simple REST API for GTFS (General Transfer Feed Specification) based on [Slim Framework](https://github.com/slimphp/Slim) and [Atlas.ORM](https://github.com/atlasphp/Atlas.Orm)

## General Information
This project provides a REST API with full support for GTFS *static*. What you need is only a GTFS feed transformed
into a SQLite 3 database and a web server. You can find a template for a valid database in the [data](/data) folder.

### Installation / Configuration
To install simply type

```
composer require gtfs/rest-api --create-project
```

or clone this GitHub repository and type 

```
composer install
```

If you want to use another file than /data/GTFS.db3 as database, you must change the database name in the [/config/constants.php](/config/constants.php) file. Change the
constant `APP_DATABASE` to the relative name without file extension.

You should also make sure, that your `APP_DEBUG` constant is set to false if you want to use the REST API in a production environment.

After installing all dependencies and configurations, you can upload the whole project into your desired directory at your web server.

### Usage
The endpoint is `{yourdomain}/api/v1/{resource}/{selector}` in general. The `{resource}` and the `{selector}` parts describe `what` you want
to get as result and `how` you want to get it. If you omit the `{selector}`, the REST API retrieves all objects of a given `{resource}`.

There's a limit of 100 objects delivered by the REST API by default using the request method `GET`. This ensures that the amount of data delivered is not too high. You can
modify the limit by appending the GET parameter `limit` to your API request, or you can set the `offset` GET parameter to retrieve the next 
results starting by `offset`.

*Note: raising the limit too high might lead to errors using the REST API!*

### Resources & Selectors
You can find the following resources in the REST API:

|Resource|Description|
|---|---|
|stops|Stop objects and information according to them|
|routes|Route objects for delimiting a search request|
|trips|Trip objects an stop times, frequencies, ... |
|fares|Fare objects based on fare rules|
|attributions|Attributions according to agencies, routes or trips|
|realtime|Receive realtime data about trips|

Each resource has different possible selectors and parameters, which are described in this section.

#### stops/byStopId
Delivers a stop by its stop ID. Further information such as subordinate stops, levels, transfers ans pathways are included.

URL: [GET] `{yourdomain}/api/v1/stops/byStopId?stopId={STOP_ID}`

#### stops/byLatLon
Delivers a selection of stops by their latitude and longitude in WGS 84 format. You can set a maximum distance in KMs optionally (default is 10km)

URL: [GET] `{yourdomain}/api/v1/stops/byLatLon?stopLat={LATITUDE}&stopLon={LONGITUDE}[&stopDistance={DISTANCE/KMs}]`

#### stops/byStopName
Delivers a selection of stops by their stop name. 

URL: [GET] `{yourdomain}/api/v1/stops/byStopName?stopName={STOP_NAME}`

#### routes/byRouteId
Delivers a route by its route ID. Further information such as the parent agency are included.

URL: [GET] `{yourdomain}/api/v1/routes/byRouteId?routeId={ROUTE_ID}`

#### routes/byRouteName
Delivers a selection of routes by their short or long name. Further information such as the parent agency are included.

URL: [GET] `{yourdomain}/api/v1/routes/byRouteName?routeName={ROUTE_NAME}`

#### trips/byTripId
Delivers a trip by its trip ID. Further information such as the parent route and agency, stop times with stops, frequencies, shapes and calendar are included.

URL: [GET] `{yourdomain}/api/v1/trips/byTripId={TRIP_ID}`

#### trips/byRouteId
Delivers a selection of trips by their route ID. Further information like parent route and agency, stop times with stops and frequencies are included. You can
set a date and a time optionally.

URL: [GET] `{yourdomain}/api/v1/trips/byRouteId?routeId={ROUTE_ID}[&date={YYYYMMDD}][&time={HH:MM:SS}]`

#### trips/byBlockId
Delivers a selection of trips by their block ID. Further information like parent route and agency, stop times with stops and frequencies are included. You can
set a date and a time optionally.

URL: [GET] `{yourdomain}/api/v1/trips/byBlockId?blockId={BLOCK_ID}[&date={YYYYMMDD}][&time={HH:MM:SS}]`

#### trips/byStopId
Delivers a selection of trips by a stop ID. This can be the ID of a particular stop or of a parent station. Further information like parent route and agency, stop times with stops and frequencies are included. You can
set a date and a time optionally.

URL: [GET] `{yourdomain}/api/v1/trips/byStopId?stopId={STOP_ID}[&date={YYYYMMDD}][&time={HH:MM:SS}]`

#### trips/byVehicleId
Delivers a trip wich is currently served by a certain vehicle. *Note: This selector works only with GTFS-realtime data available!*

URL: [GET] `{yourdomain}/api/v1/trips/byVehicleId?vehicleId={VEHICLE_ID}`

#### fares/byFareId
Delivers a fare by its fare IT. Further information like fare rules are included.

URL: [GET] `{yourdomain}/api/v1/fares/byFareId?fareId={FARE_ID}`

#### fares/byZoneId
Delivers a selection of fares by their origin and destination zone ID. Further information like the fare rules leaded to matching are included. You can set an agency ID
optionally.

URL: [GET] `{yourdomain}/api/v1/fares/byZoneId?originZoneId{ORIGIN_ID}&destinationZoneId={DESTINATION_ID}[&agencyId={AGENCY_ID}]`

#### fares/byRouteId
Delivers a selection of fares by their route ID. Further information like the fare rules leaded to matching are included.

URL: [GET] `{yourdomain}/api/v1/fares/byRouteId?routeId={ROUTE_ID}`

#### attributions/byAgencyId
Delivers a selection of attributions by their agency ID.

URL: [GET] `{yourdomain}/api/v1/attributions/byAgencyId?agencyId={AGENCY_ID}`

#### attributions/byRouteId
Delivers a selection of attributions by their route ID.

URL: [GET] `{yourdomain}/api/v1/attributions/byRouteId?routeId={ROUTE_ID}`

#### attributions/byTripId
Delivers a selection of attributions by their trip ID.

URL: [GET] `{yourdomain}/api/v1/attributions/byTripId?tripId={TRIP_ID}`

#### realtime/alerts
Posts a GTFS-realtme feed message containing service alerts into the database.

URL: [POST] `{yourdomain}/api/v1/realtime/alerts`

Deletes a certain GTFS-realtime service alert by its alert ID.

URL: [DELETE] `{yourdomain}/api/v1/realtime/alerts?alertId={ALERT_ID}`

#### realtime/tripUpdates
Posts a GTFS-realtime feed message containing trip updates into the database.

URL: [POST] `{yourdomain}/api/v1/realtime/tripUpdates`

Deletes trip updates for a certain trip identified by its trip and route ID. Optionally a trip start date
and trip start time can be passed.

URL: [DELETE] `{yourdomain}/api/v1/realtime/tripUpdates?tripId={TRIP_ID}&routeId={ROUTE_ID}[&tripStartDate={TRIP_START_DATE}][&tripStartTime={TRIP_START_TIME}]`

#### realtime/vehiclePositions
Posts a GTFS-realtime feed message containing vehicle positions into the database.

URL: [POST] `{yourdomain}/api/v1/realtime/vehiclePositions`

Deletes vehicle positions for a certain vehicle identified by its vehicle ID. Optionally a vehicle label
and a license plate can be passed.

URL: [DELETE] `{yourdomain}/api/v1/realtime/vehiclePositions?vehicleId={VEHICLE_ID}[&vehicleLabel={VEHICLE_LABEL}][&vehicleLicensePlate={VEHICLE_LICENSE_PLATE}]`

#### realtime/garbageCollector
Sometimes trip updates and vehicle positions got stuck due to an application error. To remove them securely from your
realtime data, you should call the garbage collector method periodically. This call removes all stuck trip updates and vehicle
positions which are updated before a time offset of 300 seconds (5 minutes) last time. You can pass a custom time offset in seconds
optionally.

URL: [DELETE] `{yourdomain}/api/v1/realtime/garbageCollector[?timeOffset={TIME_OFFSET_SECONDS}]`

### Currently Not Supported
There're are some features, which are currently not supported in this version:

* Currently, a frequency based trip can only be found when the `time` parameter is before
the original departure time of the trip. If the `time` parameters points to a timestamp after the trip start time (or the departure time at the corresponding
stop when using the `byStopId` selector) the trip will not be found.
* Translations are supported by the database schema, but there's no selector for them yet. It is nearly impossible to map them to their fields automatically,
since they're using dynamic field names. One possible workaround would be to fetch all translations and map them later on application level.

### Latest Changes
See [CHANGELOG](/CHANGELOG.md) for a overview about the latest changes.

## Extending & Contribution
The REST API is designed for easy extending by your own resources and selectors.

### Extending
To provide your own resource type, you simply have to create a controller class in the [/src/Controller](/src/Controller) directory. The name convention
for the controller class is `{ResourceName}Controller`. (*Note the singular spelling!*) To run your own controller, your controller class
must extend the [BaseController](/src/Controller/BaseController.php) class and override the `getAll(...)` selector method. 

You can create your own selector methods by adding any method with ne name convention `get{byYourSelector}` - The controller will be 
available at `{yourdomain}/api/v1/resourceName/byYourSelector`.

If your controller needs to receive data from the body transmitted using the `POST` method, your selector method must start with `post`. Thus any `POST` request will
be dispatched to a corresponding controller method `post{yourSelector}` if existing. You can also use request method `DELETE` to perform delete
actions on your controller. The corresponding controller method must be named like `delete{yourSelector}`.

### Contributing
If you want to contribute this project by adding a basic functionality, you're welcome! Please take a look into existing code to adapt your coding
style to the existing one. A well-documented source code is also more easy to read and review ;-)

## License
This project is licensed under the MIT license. See [LICENSE](LICENSE.md) for more details. 