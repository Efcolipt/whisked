/api
–> /controllers – all the business logic for all individual modules
–> /models – create mongodb schema and define them in this folder in separate files for every schema
–> /routes – create API routes for every models created inside /models folder
–> db.js – all the db connection related stuff will be in this file
–> index.js – main file to run the API server
–> config.js – to store and access all global variables & functions. e.g. authentication token, checkAuthenticated() etc.