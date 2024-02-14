# API with Passport Authentication In Laravel

This project is a RESTful API built using PHP with Passport authentication for user registration, login, profile retrieval, and logout functionalities. It allows users to interact with the API endpoints securely using authentication tokens. The project utilizes Postman for testing the endpoints.

## Getting Started

Follow these instructions to set up and run the project on your local machine.

### Prerequisites

- PHP installed on your machine
- MySQL database server
- Postman for API testing

### Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/Abidanik86/Api_passport_laravel.git
   ```

2. Navigate to the project directory:

   ```bash
   cd your-repository
   ```

3. Set up the database:
   - Create a MySQL database named `rest_api` or any desired name.
   - Configure the database connection settings in the `.env` file.

4. Migrate the database schema:

   ```bash
   php artisan migrate
   ```

5. Run the PHP server:

   ```bash
   php -S localhost:8000 -t public
   ```

6. Open Postman to test the API endpoints.

## Usage

### Register

- **Endpoint**: `POST /api/register`
- **Description**: Register a new user with email and password.
- **Request Body**: 
  ```json
  {
    "name": "Your Name",
    "email": "your@example.com",
    "password": "your_password"
  }
  ```
- **Response**: 
  Upon successful registration, a JSON response with the user details and authentication token.

### Login

- **Endpoint**: `POST /api/login`
- **Description**: Log in with email and password to obtain an authentication token.
- **Request Body**: 
  ```json
  {
    "email": "your@example.com",
    "password": "your_password"
  }
  ```
- **Response**: 
  Upon successful login, a JSON response with the authentication token.

### Get Profile

- **Endpoint**: `GET /api/profile`
- **Description**: Retrieve the user profile information.
- **Headers**: 
  - `Authorization: Bearer YOUR_TOKEN`
- **Response**: 
  Upon successful retrieval, a JSON response with the user profile data.

### Logout

- **Endpoint**: `GET /api/logout`
- **Description**: Log out the user by invalidating the authentication token.
- **Headers**: 
  - `Authorization: Bearer YOUR_TOKEN`
- **Response**: 
  Upon successful logout, a JSON response confirming the action.

## Author

- **Abid Hasan Anik** - [GitHub Profile](https://github.com/Abidanik86)


## Acknowledgments

- Inspired by the need for secure authentication in web applications.
- Thanks to Laravel Passport for making OAuth2 implementation straightforward.
- Appreciation to the PHP and Laravel community for valuable insights and contributions.