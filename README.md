# Extension TeemIp Cable Management

You've just created a new iTop extension, congratulations!

## What to do next ?

  - Adjust the iTop mininum version (by default iTop 2.6.0) if needed by editing the `version` in the datamodel XML file (`<itop_design xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.6">`)
  - Install this (empty) extension in your iTop using the setup
  - Get the [toolkit](https://www.itophub.io/wiki/page?id=latest%3Acustomization%3Adatamodel) and update your iTop (check the option "symbolic links")
  - Update your code then refresh the iTop pages to see the magic happen... or not (ah, ah, debug!!)

### Autoloader
If you declare some PHP classes in the `src` folder, you'll have to build/update the autoloader with [Composer](https://getcomposer.org). The command line (to be launched from the root directory of your extension) is the following:

```
composer update
composer dump-autoload -o
```

### Hooks
If you implement some "Hooks" (i.e. classes implementing one of the [Extension APIs](https://www.itophub.io/wiki/page?id=2_7_0%3Acustomization%3Aextensions_api), for example iApplicationExtension), put them in the `src/Hook` folder and add the file `datamodel` section of the `module` file for an explicit inclusion. The same rule applies if you declare some datamodel classes in plain PHP.

```
		//
		'datamodel' => array(
			'vendor/autoload.php',
			'model.test-extension.php', // contains the PHP code generated from the datamodel.test-extension.xml
			'src/Hook/MyHook.php', // Explicit include, hooks cannot benefit from the autoloader
		),

```