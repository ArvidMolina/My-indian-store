![Image 6](https://myindianstore.eu/img/my-store-logo-1583408541.jpg)

The whole project was made with PrestaShop for which I used a template
that the client bought, so I only had to modify the front-end part with
HTML5, CSS3, JavaScript. For some elements I used Bootstarp, for the
images I used Photoshop and edited them using the store's own images,
for the fonts I used open source fonts. In the back-end part I worked with
PHP and MySQL database. The entire project is on a shared cPanel-based
server. The file transfer was via FTP using FileZilla.

## Installing PrestaShop

PrestaShop is very easy to install. Once all the files are on your web server, you should be able to start configuring your shop in no less than 5 minutes in most cases: the installation process is very simple, as the installer takes care of everything for you. Less experienced users might need between 10 and 20 minutes to complete the whole process.

Before you get started, make sure you have all the requirements available: server space at a hosting provider, domain name, FTP client, text editor. Makes sure to follow the instructions in the "What you need to get started" 


Installing PHP/MySQL applications on a web server. If the lack of details bothers you, you will find detailed instructions in the next section of this chapter.

Download and unzip the PrestaShop package if you haven't already.
Create a database for PrestaShop shop on your web server if it is possible. In case there is no MySQL user who has all privileges for accessing and modifying this database, create it as well.
Upload the three PrestaShop files to the chosen location on your web server, including the .zip file (it will unzip itself afterwards).
Run the PrestaShop installation script by accessing the public URL for the chosen location in a web browser. This should be the URL where you uploaded the PrestaShop files.
Follow the instructions on each screen of the installer.
Once the installation is done, delete the /install folder and write down the new of the /admin folder, which has been generated in order to be unique to you, for security reasons.
PrestaShop should now be installed and ready to be configured! 

## Creating a database for your shop
Before you can actually install PrestaShop, you need to make sure your MySQL server has a database ready for PrestaShop's data. If not, you must create one.

Creating a database can be done using any database administration tool. We will be using the free phpMyAdmin tool (http://www.phpmyadmin.net/), which should come pre-installed on most web hosting.

Connect to phpMyAdmin using your account credentials, which your host provided you with. It should be accessible through a standard URL, tied to your domain name, or host's domain name.


![Image 1](http://doc.prestashop.com/download/attachments/20840671/004-phpmyadmin-en.png?version=1&modificationDate=1394564033000&api=v2)

In the left column, you can see the databases currently available on your MySQL server. Some of them should be left alone, because they are either used by phpMyAdmin or by the host: phpmyadmin, mysql, information_schema, performance_schema and others. Read your host's documentation to know if one of these can be used as a default database.

Either way, you can create a brand new database by going in the "Database" tab and using the central form named "Create new database". Simply enter a unique name, and click "Create". The name of the database will be added to the list on the left. You can now use it to store PrestaShop's data.

### Launching the auto-installer

Now comes the part where it all comes together: installing PrestaShop.

The installation process is quite easy, as it is streamlined by PrestaShop's auto-installer. You should be able to browse through it in handful of minutes. Make sure to read each page thoroughly so as not to miss any information.

To launch the installer, simply browse to PrestaShop's location on your web server: the script will automatically detect that PrestaShop is not yet installed, and will take you to the auto-installer. At the same time, this will unzip the prestashop.zip file that you had uploaded. Now all the PrestaShop files are available on your webserver.

From there on, you just have to read, click, and fill a few forms.

There are 6 steps. At the top of the page, the installation assistant gives you a visualization of where you are in the process: the gray circles turn into green check marks after each step is completed.


![Image 2](http://doc.prestashop.com/download/attachments/20840671/005-faces-en161.png?version=1&modificationDate=1437751163000&api=v2)




### Welcome page

This page is a quick intro into the installation process. You can choose the language in which the installer will display its instructions.




![Image 3](http://doc.prestashop.com/download/attachments/51840063/003-installer1.png?version=1&modificationDate=1479321856000&api=v2)

You also get a link to the documentation site (http://doc.prestashop.com/), and a link to our Support offer. You can learn more about our support service by going to http://support.prestashop.com/en/.

Select the language in which you wish the installer to be, then click the "Next" button. This will also set the default language for your PrestaShop installation – but other languages will also be available for you to enable.


### System compatibility & Store information

The third page makes a quick check of all the server parameters on your host. In most cases, you will not see this page, because if nothing wrong is found, you are taken directly to the fourth page, "Store information". If so, you can still go have a look at the third page by clicking on the "System compatibility" link in the left sidebar.

If something does go wrong during the server check that happens in the third step, the installer displays the "System compatibility" page, where you can see all the checks that failed.

System compatibility
This page checks that everything is OK with your server configuration: PHP settings, permissions on files and folders, third-party tools, etc.

![Image 4](http://doc.prestashop.com/download/attachments/20840671/008-step3-compatOK161.png?version=1&modificationDate=1437751431000&api=v2)

If anything goes wrong, the installer stops you here, enabling you to see the few technical details that need fixing, be it changing the PHP configuration or updating the file permissions.

![Image 5](http://doc.prestashop.com/download/attachments/20840671/008-step3-compatNotOK161.png?version=2&modificationDate=1437752608000&api=v2)

While changing the PHP configuration can only be done on a case-by-case basis depending on your level of access to your server, and therefore can only be explained in full details, updating the file permissions is easier to explain.

Permissions are the way a filesystem grants access rights to specific users or user groups, controlling their ability to view or make changes to files and folders. The installer needs to make several changes to the files that you uploaded, and if the filesystem does not allow for these changes through proper permissions, then the installer cannot complete its process.

Hence, if the installer shows that some files or folders do not have proper permission, you have to change these permissions yourself. This will require you to access your files on your web server, and therefore use your FTP client (such as FileZilla) or the command line.

Log-in to your server account using your FTP client, browse to PrestaShop's folder, and find the folders that are marked by the installer as needing a permission change.

Thanks to FileZilla (and most FTP clients), you do not have to use any Unix command. Most FTP clients make it possible to change permissions easily and graphically: once you have found a file or folder that needs such a change, right-click on it, and in the context menu choose "File permissions...". It will open a small window.



![Image 6](http://doc.prestashop.com/download/attachments/20840671/011-filezillaRights.png?version=1&modificationDate=1394649012000&api=v2)

Depending on your server configuration (which you don't always have a hand at), you will need to check both the "Read" and "Execute" columns of boxes, and at least the "Owner" and "Group" rows for the "Write" column. Some hosts might require you to have the public "Write" box checked, but be careful with that: it is rarely a good thing to have anyone on your server be able to edit the content of your PrestaShop installation.

Some folders might need to have all their files and sub-folders change permissions too. In that case, check the "Recurse into subdirectories" box.

While changing permissions in your FTP client, you should regularly check that you have made the correct changes by running the installer's compatibility checks again: click the installer's "Refresh these settings" button as often as necessary.
Once all indicators are green, you can click "Next". If you cannot have them all green, at least make sure the installer displays the "PrestaShop compatibility with your system environment has been verified!" message at the top of the page.


### Store information

This is where you can start customizing your shop: give it a name, indicate its main activity, and indicate the personal information for the shop owner (which has legal binding in most countries)...



![Image 7](http://doc.prestashop.com/download/attachments/51840063/004-installer2.png?version=1&modificationDate=1479321856000&api=v2)

This is also where you choose the password to log in to the administration panel of your shop - choose wisely so that you will remember it, but make sure it is secure too!

Click "Next" to continue.

Step 5: System configuration
This page contains a form that enables you to tell PrestaShop where the database server is, and which database it should use, along with a few other details. All this information should have been provided to you by your web host.


![Image 8](http://doc.prestashop.com/download/attachments/20840671/010-step5-DBconfig-en161.png?version=1&modificationDate=1437753333000&api=v2)


Fill all the fields with the database connection information provided by your web-host:

- **Database server address**. The hostname of your MySQL server. It can be tied to your domain name (i.e.&nbsp;[http://sql.example.com](http://sql.example.com/)), tied to your web host (<span class="nolink">i.e.&nbsp;[http://mysql2.alwaysdata.com](http://mysql2.alwaysdata.com/))</span>, or simply be an IP address (i.e. 46.105.78.185).
- **Database name**. The name of the database where you want PrestaShop to store its data. This is either an existing database on your MySQL server, or the one that you created using phpMyAdmin (or any other SQL tool) in the "Creating a database for your shop" section of this guide.
- **Database login**. The name of the MySQL user that has access to your database.
- **Database password**. The password of the MySQL user.
- **Database engine**. The database engine is the core of your database server. InnoDB is the default one and you should use it, but the more technical among you might want to choose another engine. Generally, there is no need to change the default setting.
- **Tables prefix**. The prefix for your database tables. "`ps_`" is the default, resulting in the PrestaShop SQL tables having names such as "`ps_cart`" or "`ps_customer`"; but if you need to install more than one instance of PrestaShop on the same database, then you must use a different prefix for each installation. However, we do recommend that you create one database per installation of PrestaShop, if your web host allows it. Better yet: make one installation of PrestaShop, and enable the multistore feature in order to manage many stores from the same PrestaShop back-end.
- **Drop existing tables**. This is only available in "Dev mode". When re-installing PrestaShop, you can choose to drop the existing PrestaShop database tables in order to start on a clean slate.


Click the "Test your database connection now!" button in order to check that you did use the correct server information.

Click "Next": the install will start configuring your shop, creating and populating the database tables, etc. This might take a few minutes: please be patient and do not touch your browser!


![Image 9](http://doc.prestashop.com/download/attachments/20840671/012-installing-en161.png?version=2&modificationDate=1437753610000&api=v2)

The installer does the following:

- Create the&nbsp;`settings.inc.php`&nbsp;file, and fill it with your settings.

- Create the database tables.

- Create the default shop with its default languages.

- Populate the database tables.

- Configure the shop's information.

- Install the default modules.

- Install the demonstration data (products, categories, user, CMS pages, etc.).

- Install the theme.

Once it is done, your shop is installed and ready to be configured!


### Completing the installation

As you can read right on the final page of the installation process, there are a couple of last actions to perform before you can leave the installer.

![Image 9](http://doc.prestashop.com/download/attachments/20840671/013-installFinished-en161.png?version=2&modificationDate=1437754213000&api=v2)

An easy way to improve your installation's security is to delete some key files and folders. This is done using your FTP client, directly on the server. The items to delete are:

- The "/install" folder (imperative).
- The "/docs" folder (optional), unless you need to test the import tool with the sample import files that this folder contains.
- The "[README.md](http://README.md)" file (optional).


Click on the "Manage your store" button in order to be taken to your administration area.

Another way to secure your installation is to use a custom name for the administration folder: change the "admin" folder for something unique to you, such as "4dmin-1537" or "MySecReT4dm1n".
Write down the new name for your new "admin" folder, because from now on you will access your administration pages using this address!

Finally, in order to close all potentially malicious doors, use your FTP client to update the files and folders permissions to 664, or 666 if your host requires it. If it turns out low access rights prevent some modules to work, you should set permissions back to 755.

Congratulations! Installation is now complete.

Log in to the PrestaShop back office by going to your newly-renamed "admin" folder, and start filling your catalog with products, adding carriers and shipping costs, adding brands and suppliers, changing the theme, and generally configuring the many settings to suit your tastes and needs.


## License

PrestaShop is free and distributed under a certain set of open-source licenses. You simply cannot use this software if you disagree with the terms of the licenses, and this step requires you to explicitly acknowledge them.

Read PrestaShop's licenses:

Open Software License 3.0 for PrestaShop itself, which you can also read at http://www.opensource.org/licenses/OSL-3.0. 
Academic Free License 3.0 for the modules and themes, which you can also read at http://opensource.org/licenses/AFL-3.0

[Open Software License 3.0 for PrestaShop](http://www.opensource.org/licenses/OSL-3.0. )

[Academic Free License 3.0 for the modules and themes](http://opensource.org/licenses/AFL-3.0)
