Changes and Improvements
The following changes and improvements were made to the codebase:

1-Refactoring and Renaming:
Classes, methods, and variables were renamed to use more meaningful and consistent names.
Code indentation and formatting were improved for better readability.

2-Separation of Concerns:
The responsibilities of different classes were separated to improve code organization and maintainability.

3-Status Handling:
The Status class was introduced to manage order statuses and provide constants for different status values.
A method to validate status values was added to ensure only valid statuses are used.

4-Address Class:
The Address class was updated to have a constructor and getter methods for its properties.
This change enhances encapsulation and data consistency.

5-Shipping Class:
The Shipping class now uses constants for shipping methods and countries to improve code readability and avoid magic values.
The tax calculation logic was refined based on shipping method and country.

6-Product Class:
The Product class remains largely the same, but its method naming and commenting were improved for clarity.

7-Order Class:
The Order class now uses the Status class for managing statuses, which enhances code readability and maintainability.

8-Unit Testing:
PHPUnit tests were created to cover the basic functionality of the Order class.
The OrderTest class tests the order status change and receipt printing functionalities.