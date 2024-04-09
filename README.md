# Introduction

The Home Energy Program Web Application is designed to assist users in identifying energy programs they may be eligible for based on their household information. The application consists of a questionnaire where users provide relevant details, and based on their responses, the application determines and displays applicable energy programs while storing the user input into a database, as well as the number of times an energy program is applicable.

# System Architecture

The system follows a typical client-server architecture. The client side is implemented using HTML, PHP, and JavaScript, while the server side is powered by PHP scripts running on a web server. All captured data is stored and managed in a MySQL database.

## Client Side

- HTML: HTML is utilized to define the layout of each web page, including text, images, forms, and other elements.
- CSS: Provides enhanced styling and presentation of the web pages, as well as keeping the webpages visually consistent.
- JavaScript: JavaScript is employed to implement visual demographic data from the database, perform calculations, handle events, and update the DOM (Document Object Model) dynamically.

## Server Side

- PHP: PHP scripts handle user input from HTML forms, validate data, interact with the MySQL database to retrieve, or store information, and generate dynamic HTML content to be sent back to the client's web browser.
- MySQL Database: MySQL is utilized to store various types of data, including user responses to the questionnaire, information about energy programs, and records of program applicability. Please see diagram below. 
- PHP scripts interact with the MySQL database using SQL (Structured Query Language) to perform operations such as inserting, updating, querying, and deleting data.

# Modules
## Questionnaire Module

The Questionnaire Module is a critical component of the application, responsible for guiding users through a series of questions aimed at gathering relevant information about their household. This module plays a crucial role in determining the eligibility of users for various energy programs. 
The Questionnaire Module presents users with a structured set of questions designed to collect essential information about their household. These questions range from topics such as the number of occupants, household income, residency ownership status, and interest in specific energy-saving initiatives (Such as Solar energy). The presentation of questions is implemented using HTML forms, where each form field corresponds to a specific question.
From a technical perspective, the questionnaire utilizes PHP to verify and validate the user responses to help ensure the data is correct and of a higher quality.

## Program Determination Module

The Program Determination Module is responsible for analyzing user responses gathered from the Questionnaire Module and determining the energy programs that are applicable to the user's specific circumstances. This module plays a crucial role in providing personalized recommendations tailored to the user's household characteristics.
Upon receiving user responses, the Program Determination Module conducts an analysis of the input data to assess the user's eligibility for various energy programs. This analysis involves comparing the user's responses against predefined eligibility criteria established for each program. These criteria may include factors such as income thresholds, residency status, household composition, and geographical location.
Based on the analysis of user input and predefined eligibility criteria, the Program Determination Module identifies the energy programs that are applicable to the user's specific circumstances. Programs that align with the user's eligibility criteria and preferences are selected for recommendation. The module utilizes a set of rules and logic implemented in PHP scripts to perform this determination process efficiently and accurately.

## Database Interaction Module

The Database Interaction Module serves as the intermediary between the web application and the MySQL database, facilitating the storage, retrieval, and manipulation of data related to user responses, program information, and applicability data.
The Database Interaction Module is responsible for establishing and managing connections to the MySQL database server. It handles the communication between the web application and the database, including the execution of SQL queries and processing of query results.
One of the primary functions of the Database Interaction Module is to store user responses collected through the Questionnaire Module. Upon receiving user input from the web application, the module inserts the data into the appropriate tables within the MySQL database. Each user response is stored as a record in the database, with fields corresponding to the various attributes captured in the questionnaire. By collecting user responses, it ensures that the data is available for future analysis and processing.

# Flow of Operation

•	User accesses the Home Energy Program Web Application through a web browser.

•	User completes the questionnaire by providing household information.

•	Upon submission, user responses are sent to the server for processing.

•	The program determination module evaluates user responses and determines applicable energy programs.

•	If the user is eligible for MHEEP, it is added to the list of applicable programs.

•	The list of applicable programs is passed to the display programs module.

•	Detailed information about each program is retrieved from the database.

•	The display programs module generates a web page to present the recommended programs to the user.

# Conclusion

The main goal of the Home Energy Program Web Application is to provide users with a convenient way to identify energy programs they may be eligible for based on their household information. The secondary goal of this program is to gauge how common certain programs are, as well as allowing the administrators of this program make more informed decisions regarding the implementation of these programs in the future. 
By leveraging a client-server architecture and utilizing HTML, CSS, JavaScript, PHP, and MySQL, the application delivers a seamless and interactive user experience as well as capture informative data that can be used to further energy directives within the local government and help to allocate funds for programs that are used more than others. 


