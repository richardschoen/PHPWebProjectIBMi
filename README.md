# PHPWebProjectIBMi
Sample PHP Web App for use on IBM i with Community PHP or on Windows or Linux with PHP 7.x. Uses IBM i Access ODBC Driver available from IBM at the IBM i Access Client Solutions site http://www-01.ibm.com/support/docview.wss?uid=isg3T1026805

# Setting up for development and use from Windows with Visual Studio
Install Visual Studio 2019

Clone project to local directory from Windows command line (or your favorite method)
```
cd /

git clone https://github.com/richardschoen/PHPWebProjectIBMi.git
```
Open PHPWebProjectIBMi.sln project solution in Visual Studio.

Update settings.php with your IBM i system host/ip address, user id and password. 

Run the project and it should execute as long as you have installed the IBM i Accedss Windows ODBC Driver.

# Setting up for development and use natively on IBM i
Make sure IBM i ACS Open Source Package Management loaded

Install Community PHP from Zend site and Unix ODBC Yum packages via ACS or via yum commands
```
yum install unixODBC

yum install unixODBC'devel
```
Make sure IBM i Access ODBC Driver for PASE is loaded Download from IBM i Access Client Solutions site http://www-01.ibm.com/support/docview.wss?uid=isg3T1026805

Upload IBM i Access RPM file to root dir in IFS (where xx is version number of RPM) ibm-iaccess-1.1.0.xx-0.ibmi7.2.ppc64.rpm

Install IBM i Access ODBC Driver
```
cd /

PATH=/QOpenSys/pkgs/bin  

export PATH
```
rpm -i ibm-iaccess-1.1.0.xx-0.ibmi7.2.ppc64.rpm  (xx is ver in zip file)
From IBM i bash shell or QSH, run following commands to clone the web project:
```
cd /

git clone https://github.com/richardschoen/PHPWebProjectIBMi.git
```

Hook up the /PHPWebProjectIBMi/PHPWebProjectIBMi directory to your Community PHP server or copy all the PHP files to a running instance of Apache or NGINX web server that is configured to servie PHP files already.
