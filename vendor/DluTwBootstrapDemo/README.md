DluTwBootstrap Demo (ZF2 module)
================================

-------------------------------------------------

Introduction
------------
The DluTwBootstrap Demo ZF2 module demonstrates the capabilities of the [DluTwBootstrap module](https://bitbucket.org/dlu/dlutwbootstrap).
The Demo shows the rendered output 'side by side' with the source code used the produce that output. It's the quickest way to get to grips
with the module.

If you are new to DluTwBootstrap, first go to [http://apps.zfdaily.com/dlutwbootstrap-demo](http://apps.zfdaily.com/dlutwbootstrap-demo) to see it in action on-line.

--------------------------------------------------------------

Installation - manual
---------------------

You need to have the [DluTwBootstrap module](https://bitbucket.org/dlu/dlutwbootstrap) installed!

1.   Go to your project's directory.
2.   Clone this project into your `./vendor` directory as a `DluTwBootstrapDemo` module:

     `git clone https://bitbucket.org/dlu/dlutwbootstrap-demo.git ./vendor/DluTwBootstrapDemo`

3.   Follow the Post installation steps bellow

Installation - with Composer
----------------------------

1.   Go to your project's directory.
2.   Edit your `composer.json` file and add `"dlu/dlutwbootstrapdemo": "dev-master"` into `require` section.
3.   Run `php composer.phar install` (or `php composer.phar update`).
4.   Follow the Post installation steps bellow

Post installation steps
-----------------------

1.   Copy everything from the DluTwBootstrap and DluTwBootstrapDemo modules `public` directories to `<your app>/public`.
2.   Enable the modules in your app config file `<your app>/config/application.config.php`:

     - add `'DluTwBootstrap',` under `modules`
     - add `'DluTwBootstrapDemo',` under `modules`

Check and Demo
--------------

Check that everything is working properly by going to the demo page:
`http://<your-machine>/tw-bootstrap-demo`

Explore the main menu to see the DluTwBootstrap module in action.

Uninstallation
--------------

You can keep the Demo module in your project's `./vendor/` directory even when the project is in production.
Just disable the Demo module in your `./config/application.config.php`. If you ever need to check anything in the Demo, just temporarily enable it.

-----------------------------------------------------------------------------------

Links
-----

- [DluTwBootstrap (ZF2 module) source](https://bitbucket.org/dlu/dlutwbootstrap)
- [DluTwBootstrap Demo (ZF2 module) source](https://bitbucket.org/dlu/dlutwbootstrap-demo)
- DluTwBootstrap Demo App (ZF2 application)
    - [Live Demo App @ http://apps.zfdaily.com/dlutwbootstrap-demo](http://apps.zfdaily.com/dlutwbootstrap-demo)
    - [Source](https://bitbucket.org/dlu/dlutwbootstrap-demo-app)
- [Tutorials and discussion of DluTwBootstrap on ZF Daily](http://www.zfdaily.com/tag/dlutwbootstrap/)