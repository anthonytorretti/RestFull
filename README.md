![RESTPHP - A basic BoilerPlate to start building your RestFull Application](logo.jpg)

RESTPHP is an extremely simple and easy to understand skeleton PHP application, reduced to the max.
It is not a framework but rather a boilerplate to begin your Restfull Application.
If you just want to show some pages, do a few database calls and a little-bit of AJAX here and there, without
reading in massive documentations of highly complex professional frameworks.

## Getting Started

First Thing to do is clone the Repository or download the project zip file on your system. 
Afterwords you must move it to your current Apache or Xampp public Folder. 

### Prerequisites

RestPhp requires "mod_rewrite" rule enaled in your web server instance.

NOTE: If you already have "mod_rewrite" enabled you may jump to the next section

If This is not alredy enabled you must:
In Xampp: Go to your "xampp\apache\conf" find the line with the following
   
```
#LoadModule rewrite_module modules/mod_rewrite.so
```
    
And Remove the comment as shown
    
```
LoadModule rewrite_module modules/mod_rewrite.so
```
    
The Same procedure is valid for native apache installations where the config file will be "httpd.conf" in your apache
installation folder.

Remeber always to restart Xampp or Apache when modifying configurations.

### Installing

There is no major installation required except for the Database to be setup and functional

* Step 1 Database Setup

  Open PhpmyAdmin or whatever Database manager you have on your system and create a new Database with any name you wish
  
  Open the newely created database and import the Database Schema given in the cloned repository "RestPhpDB.sql".
  
  This is the database structure corresponding to the "boilerplate model" already implemented on the Server     (Devices,Brands,Categories,Review)
  
* Step 2 App Configuration

   Now you must open the project in your favorite IDE
   
   Open the "config.php" file in the "application/config/" folder and setup the configuration for your Database
   ```
   define('DB_TYPE', 'mysql');
   define('DB_HOST', '127.0.0.1');
   define('DB_NAME', '[your database name]');
   define('DB_USER', '[your db user name]');
   define('DB_PASS', '[your db password]');
   define('DB_CHARSET', 'utf8');
   ```
     
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds
```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc


