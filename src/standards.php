<?php
/*
 * #############################################################################################################################
 * ### NAMING STANDARDS ###
 * #############################################################################################################################
 *
 * VARIABLES - GLOBAL:
 * Global variables that will be accessed by many scopes;
 * - Names must be all 'upper-case' style;
 * - Names must be separated with '_';
 * - Ex.:
 *      NAMES_MUST_BE_LIKE_THAT
 *
 *
 * VARIABLES - LOCAL:
 * Local variables that will be used inside defined closed scopes;
 * - Names must be in 'camel-case' style;
 * - Ex.:
 *      $nameMustBeLikeThat
 *
 *
 * FUNCTIONS:
 * Regular functions;
 * - Names must be in 'pascal-case' style (camel-case with the first letter upper case to);
 * - Ex.:
 *      NamesMustBeLikeThat
 *
 *
 * CLASSES - STATIC:
 * Classes that have only static properties and methods, commonly used like helpers.
 * - Names must be in 'upper-case' style;
 * - Words must be separated with '_';
 * - Ex.:
 *      NAMES_MUST_BE_LIKE_THAT
 *
 *
 * CLASSES - INSTANCES:
 * Classes that will be used like regular object instances.
 * - Names must be in 'pascal-case' style (camel-case with the first letter upper case to);
 * - Ex.:
 *      NamesMustBeLikeThat
 *
 *
 * CLASS - ATTRIBUTES:
 * Regular class attributes;
 * - Names must be in 'camel-case' style;
 * - Ex.:
 *      nameMustBeLikeThat
 *
 *
 * CLASS - CONSTANTS:
 * - Names must be in 'upper-case' style;
 * - Words must be separated with '_';
 * - Ex.:
 *      NAMES_MUST_BE_LIKE_THAT
 *
 *
 * CLASS - METHODS:
 * Regular class methods;
 * - Names must be in 'pascal-case' style (camel-case with the first letter upper case to);
 * - Ex.:
 *      NamesMustBeLikeThat
 *
 *
 * ENUMERATIONS:
 * Classes that are used to store values like enumerations.
 * - First letter must be and lower case 'e';
 * - Words must be all 'upper-case' style;
 * - Words must be separated with '_';
 * - Ex.:
 *      eNAMES_MUST_BE_LIKE_THAT
 *
 *
 * ENUMERATION - VALUE:
 * Class constants used to represent enumerations values inside an enumeration class;
 * - Words must be all 'upper-case' style;
 * - Words must be separated with '_';
 * - Ex.:
 *      NAMES_MUST_BE_LIKE_THAT
 *
 */
