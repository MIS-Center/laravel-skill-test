# Laravel Skill Test

Use Laravel with API endpoints required for the following structure.

Schools DB table consists of these fields: Name (required), email (required and valid), logo (minimum 100×100, required), website

Campuses DB table consists of these fields: Name (required), School (foreign key to Schools, required), email, phone, address

Courses DB table consists of these fields: Name (required), Campus (foreign key to Campuses, required), Course Types (course can have multiple types, required at least one), price (required)

Course Types DB table consists of these fields: Name (required)

Use database migrations and factory (dummy data) to create those schemas above

Store school logos in storage/app/public folder and make them accessible from public

Email notification: send email to school whenever new campus is entered
