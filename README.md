# PHPWebProjectIBMi
Sample PHP Web App for use on IBM i with Community PHP or on Windows or Linux with PHP 7.x. Uses IBM i Access ODBC Driver available from IBM at the IBM i Access Client Solutions site:

http://www-01.ibm.com/support/docview.wss?uid=isg3T1026805

# Setting up for development and use from Windows with Visual Studio or your favorite PHP IDE
Install ***Visual Studio 2019*** (Community Edition available FREE)

If using Visual Studio, you will need PHP Tools for Visual Studio (Not FREE, but demo available)

https://marketplace.visualstudio.com/items?itemName=DEVSENSE.PHPToolsforVisualStudio

Make sure your PHP environment have the following PHP extensions enabled in your PHP.INI along with other PHP extensions you're using:
```
[ExtensionList]
extension=php_odbc.dll
extension=php_pdo_odbc.dll
```
Clone project to local directory from Windows command line (or your favorite method)
```
cd /

git clone https://github.com/richardschoen/PHPWebProjectIBMi.git
```
Open PHPWebProjectIBMi.sln project solution in Visual Studio.

***Update settings.php with your IBM i system host/ip address, user id and password*** 

Run the project and it should execute as long as you have installed the IBM i Acceds Windows ODBC Driver.

Run the following URLs to check ODBC and PDO connectivity

http://localhost/odbctest1.php

http://localhost/pdotest1.php

Run the following URL to test the web app:

http://localhost/index.php

-or-

http://localhost/qcustcdtlist.php

***Note:** Your local host port may be ***auto-assigned by Visual Studio*** when you run your project so adjust sample URLs above accordingly.


# Setting up for development and use natively on IBM i
Make sure IBM i ACS Open Source Package Management loaded

Install Community PHP from Zend site and Unix ODBC Yum packages via ACS or via yum commands
```
yum install unixODBC

yum install unixODBC'devel
```
Make sure IBM i Access ODBC Driver for PASE is loaded Download from IBM i Access Client Solutions site:

http://www-01.ibm.com/support/docview.wss?uid=isg3T1026805

Upload IBM i Access RPM file to root dir in IFS (where xx is version number of RPM) ibm-iaccess-1.1.0.xx-0.ibmi7.2.ppc64.rpm

Install IBM i Access ODBC Driver from bash shell, QSH or QP2TERM session
```
cd /

PATH=/QOpenSys/pkgs/bin  

export PATH

rpm -i ibm-iaccess-1.1.0.xx-0.ibmi7.2.ppc64.rpm  (xx is ver in zip file)

```

From IBM i bash shell,  QSH or QP2TERM session, run following commands to clone the web project:
```
cd /

git clone https://github.com/richardschoen/PHPWebProjectIBMi.git
```

Hook up the /PHPWebProjectIBMi/PHPWebProjectIBMi directory to your Community PHP server or copy all the PHP files to a running instance of Apache or NGINX web server that is configured to servie PHP files already.

***Update settings.php with your IBM i system host/ip address, user id and password*** 

Run the following URLs to check ODBC and PDO connectivity

http://ibmiserverorip/odbctest1.php

http://ibmiserverorip/pdotest1.php

Run the following URL to test the web app:

http://ibmiserverorip/index.php

-or-

http://ibmiserverorip/qcustcdtlist.php

***Note:** Your url and port may be different  ***depending on your Apache or NGINX server port configurations*** so adjust sample URLs above accordingly when you test.
