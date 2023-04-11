<?php

# Core
require_once "profiler.php";
require_once "dev.php";
require_once "paths.php";

# Vendor
require_once '../vendor/autoload.php';

# Application
require_once PATH_APP."/_configs/_loader.php";
require_once PATH_APP."/_providers/_loader.php";
require_once PATH_APP."/_application/_loader.php";
