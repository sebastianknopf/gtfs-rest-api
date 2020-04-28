# Changelog

Additional changelog for describing features of each version more detailed than the commit messages.

## Version 1.1.0
Support for GTFS-realtime - Data can be pushed as GTFS-realtime feed in request body to the API
and will be stored and related in the database. If there're realtime data available for a certain trip,
they'll be linked automatically. GTFS-realtime service alerts are currently not fully supported.

## Version 1.0.0
Basic selectors for all commonly used data in GTFS. Currently no support for frequency based trips
and translations.