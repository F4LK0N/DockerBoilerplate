# Naming Conventions
Description of the naming conventions defined and used in this project.



# PHP

## GLOBAL VARIABLES
Global variables and function that will be accessed by many scopes.  
- Names must be all 'upper-case' style;  
- Words must be separated with and underscore '_';  
```PHP
	$GLOBAL_VARIABLE;
```

## STATIC CLASSES
Global variables and function that will be accessed by many scopes.  
- Names must be all 'upper-case' style;  
- Words must be separated with and underscore '_';  
```PHP
	$GLOBAL_VARIABLE;
```


## Variables
Local variables that will be used inside defined closed scopes;
- Names must be in 'camel-case' style;  
- Concepts can be separated with and underscore '_';  
```PHP
	$localVariable;
	$localVariable_ConceptDivider;
```

## Functions
Regular functions  
- Names must be all 'upper-case' style;  
- Words must be separated with and underscore '_';  
```PHP
	REGULAR_FUNCTION();
```


CLASSES - STATIC:
Classes that have only static properties and methods, commonly used like helpers.
- Names must be in 'upper-case' style;
- Words must be separated with '_';
- Ex.:
	NAMES_MUST_BE_LIKE_THAT


CLASSES - INSTANCES:
Classes that will be used like regular object instances.
- Names must be in 'pascal-case' style (camel-case with the first letter upper case to);
- Ex.:
	NamesMustBeLikeThat


CLASS - ATTRIBUTES:
Regular class attributes;
- Names must be in 'camel-case' style;
- Ex.:
	nameMustBeLikeThat


CLASS - CONSTANTS:
- Names must be in 'upper-case' style;
- Words must be separated with '_';
- Ex.:
	NAMES_MUST_BE_LIKE_THAT


CLASS - METHODS:
Regular class methods;
- Names must be in 'pascal-case' style (camel-case with the first letter upper case to);
- Ex.:
	NamesMustBeLikeThat


ENUMERATIONS:
Classes that are used to store values like enumerations.
- First letter must be and lower case 'e';
- Words must be all 'upper-case' style;
- Words must be separated with '_';
- Ex.:
	eNAMES_MUST_BE_LIKE_THAT


ENUMERATION - VALUE:
Class constants used to represent enumerations values inside an enumeration class;
- Words must be all 'upper-case' style;
- Words must be separated with '_';
- Ex.:
	NAMES_MUST_BE_LIKE_THAT
