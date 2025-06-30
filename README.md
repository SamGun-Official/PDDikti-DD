# PDDikti-DD

A project built using the Laravel 10 framework and Oracle 11g as its database, developed as a final project for the Distributed Database course, which implements Materialized Views (MV) in a peer-to-peer setup between clients.

## Contributors

The following are the names of the contributors to this project:

1. Samuel Gunawan (https://github.com/SamGun-Official)
2. Ignatius Odi (https://github.com/IgnatiusOdi)
3. John Louis Airlangga W. J. (https://github.com/jlairlangga)

## Installation

The following are several requirements that must be met to install the project:

-   PHP must be version 8.1 or newer
-   [PHP oci8 extension](https://pecl.php.net/package/oci8) (Download pre-compiled DLL file from PECL site and enable the extension in your **php.ini**)
-   [Oracle Instant Client Version 21.x or newer](https://www.oracle.com/in/database/technologies/instant-client/winx64-64-downloads.html)

After all the requirements are fulfilled, run `composer install` and `npm install` to install all required dependencies. Then copy the `.env.example` file as `.env` and modify the Oracle configuration to match your database configuration. You can also migrate dummy data by running this command:

```powershell
php artisan migrate:refreshAll
```

## Configurations

For the TNS names configuration in Oracle, you can refer to the example provided in the `tnsnames.ora` [configuration file](https://github.com/SamGun-Official/PDDikti-DD/tree/main/example/tnsnames.ora). You can find the configuration file in your Oracle installation directory, for example: `C:\Oracle\product\11.2.0\dbhome_1\NETWORK\ADMIN`.

Please ensure that you have created the database link between Oracle database instances, using an example like the one in `.env.example`. Make sure the link name matches the one specified in the `.env` file. The following are example credentials used during the development of this project:

```env
DB_CONNECTION_PDDIKTI=pddikti
DB_HOST_PDDIKTI=0.0.0.0             # Database Destination IP
DB_PORT_PDDIKTI=1521
DB_SERVICE_NAME_PDDIKTI=PDDIKTI     # Database Service Name
DB_LOAD_BALANCE_PDDIKTI=no
DB_DATABASE_PDDIKTI=PDDIKTI         # Database Name
DB_USERNAME_PDDIKTI=pddikti         # Database Login Username
DB_PASSWORD_PDDIKTI=pddikti         # Database Login Password

DB_CONNECTION_ISTTSKAMPUS=istts_kampus
DB_HOST_ISTTSKAMPUS=10.10.1.146
DB_PORT_ISTTSKAMPUS=1521
DB_SERVICE_NAME_ISTTSKAMPUS=ISTTS_KAMPUS
DB_LOAD_BALANCE_ISTTSKAMPUS=no
DB_DATABASE_ISTTSKAMPUS=ISTTS_KAMPUS
DB_USERNAME_ISTTSKAMPUS=BAA
DB_PASSWORD_ISTTSKAMPUS=BAA

DB_CONNECTION_ISTTSDOSEN=istts_dosen
DB_HOST_ISTTSDOSEN=10.10.1.147
DB_PORT_ISTTSDOSEN=1521
DB_SERVICE_NAME_ISTTSDOSEN=ISTTS_DOSEN
DB_LOAD_BALANCE_ISTTSDOSEN=no
DB_DATABASE_ISTTSDOSEN=ISTTS_DOSEN
DB_USERNAME_ISTTSDOSEN=dosen
DB_PASSWORD_ISTTSDOSEN=dosen

DB_DBLINK_1=PubFUpddiktiTObaa   # DBLINK NAME: PDDIKTI TO BAA
DB_DBLINK_2=PubFUbaaTOpddikti   # DBLINK NAME: BAA TO PDDIKTI
DB_DBLINK_3=PubFUbaaTOdosen     # DBLINK NAME: BAA TO DOSEN
DB_DBLINK_4=PubFUdosenTObaa     # DBLINK NAME: DOSEN TO BAA
```

Below are sample login credentials for accessing the web application:

```
=> FOR LOGIN AS PDDIKTI ROLE
Username: odi
Password: odi

=> FOR LOGIN AS BAA ROLE
Username: samgun
Password: samgun

=> FOR LOGIN AS DOSEN ROLE
Username: airlangga
Password: airlangga
```

## License

This project is open-sourced and is licensed using the [MIT license](https://opensource.org/licenses/MIT).
