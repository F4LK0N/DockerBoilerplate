<?php
use Phalcon\Autoload\Loader;

# Core
require "profiler.php";
require "dev.php";
require "paths.php";

# Vendor
require '../vendor/autoload.php';

# Application
require PATH_APP."/_configs/_loader.php";
require PATH_APP."/_providers/_loader.php";
require PATH_APP."/_application/_loader.php";

VD_ALL();
