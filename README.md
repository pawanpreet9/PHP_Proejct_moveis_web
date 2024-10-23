# Blockbuster Pictures Production - Movie Selling Website

This project is a **content management system (CMS)** for **Blockbuster Pictures Production**, designed to facilitate online movie sales and management. Authorized users such as employees (e.g., marketers, content creators) can manage the movie database without needing IT support. The website will allow users to add, edit, and delete movie information and display it on a user-friendly interface.

## Table of Contents

- [Introduction](#introduction)
- [Objectives](#objectives)
- [Features](#features)
- [Database Structure](#database-structure)
- [Installation](#installation)
- [Usage](#usage)

## Introduction

This project aims to develop an online movie-selling platform that allows **Blockbuster Pictures Production** to reach a global audience by offering an efficient way to manage movie-related content. The platform enables both **content creators** and **marketers** to update movie information without technical support, while the user-facing website displays movies to potential customers.

## Objectives

The goal is to provide a user-friendly CMS with three main sections:

1. **Home**: Contains the company's introduction and details.
2. **View Movies**: A catalog of available movies with their details.
3. **Contact Us**: A form to allow visitors to send queries.

## Features

- **Admin Capabilities**: 
    - Add, edit, and delete movies.
    - Manage categories (genres), actors, and directors.
    - Update data without technical assistance.
  
- **User Interface**:
    - View a list of movies with details such as release date, genre, actors, and directors.
    - Search and browse movies.

## Database Structure

The website will manage data using a relational database with the following four main tables:

1. **Movies**: Contains details such as movie name, release date, duration, language, etc.
2. **Genres**: Stores different movie genres.
3. **Actors**: Information about the actors, including name and nationality.
4. **Directors**: Information about the directors involved in the movie production.

### Database Example

```sql
CREATE TABLE movies (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  release_date DATE,
  language VARCHAR(50),
  duration INT
);

CREATE TABLE genres (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE actors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  nationality VARCHAR(100)
);

CREATE TABLE directors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);
```
## Installation

### Prerequisites

- **XAMPP**: Includes Apache, MySQL, and PHP. You can download it from [XAMPP's official website](https://www.apachefriends.org/index.html).
- **phpMyAdmin**: Bundled with XAMPP for managing MySQL databases.
- **Git**: Required if you want to clone the repository from GitHub.

### Steps

1. **Download and Install XAMPP**
   - Download XAMPP for your operating system from [XAMPP's official website](https://www.apachefriends.org/index.html).
   - Follow the installation prompts, and make sure you install **Apache**, **MySQL**, and **phpMyAdmin**.
   - Once installed, open the **XAMPP Control Panel** and click **Start** for both **Apache** and **MySQL** services.

2. **Clone the Repository**
   - Navigate to your XAMPP `htdocs` folder, typically located in `C:\xampp\htdocs` on Windows.
   - Run the following command to clone the repository:
     ```bash
     git clone https://github.com/yourusername/movies-website.git
     cd movies-website
     ```

3. **Set Up the Database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin) in your browser.
   - Create a new database, for example, `movies_db`.
   - Import the provided SQL file (if available) to set up the necessary tables.

4. **Configure Database Connection**
   - Open the project’s configuration file (e.g., `config.php` or `.env`) and update the database connection settings:
     ```php
     DB_HOST=127.0.0.1
     DB_NAME=movies_db
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Access the Website**
   - Open your browser and go to `http://localhost/movies-website` to view the user-facing part of the site.
   - To access the admin panel, navigate to `http://localhost/movies-website/admin`.

## Usage

### 1. Admin Panel
The admin panel is designed for authorized users (such as employees) to manage movies and their associated data.

- **URL**: `http://localhost/movies-website/admin`
- **Features**:
  - **Add New Movies**: Authorized users can add new movies to the database by providing details such as the movie title, genre, release date, language, duration, and description.
  - **Edit Movies**: Existing movies can be updated with new information.
  - **Delete Movies**: Users can remove movies from the website.
  - **Manage Genres**: Admins can add, edit, or delete genres.
  - **Manage Actors & Directors**: Admins can add information about the actors and directors associated with the movies.

### 2. User Interface (Customer-Facing)

This section is where users (customers) can browse through the available movies and get detailed information about each one.

- **URL**: `http://localhost/movies-website`
- **Features**:
  - **View Movies**: Users can browse through the movie catalog, which displays the available movies with details such as title, genre, release date, and more.
  - **Search Functionality**: Customers can search for movies by title, genre, or other criteria.
  - **Movie Details**: Clicking on a movie displays more detailed information, including actors and directors.
  - **Contact Us**: Users can fill out a form on the Contact Us page to send inquiries.

### 3. Managing the Database

Using **phpMyAdmin**, you can view and modify the database as needed.

- **phpMyAdmin URL**: `http://localhost/phpmyadmin`
- **Database Name**: `movies_db`
- You can manually edit or add to the database via phpMyAdmin, such as adding new movies, genres, actors, and directors.

### 4. Security

- Ensure that access to the admin panel is restricted to authorized personnel.
- Secure the **phpMyAdmin** interface by setting a strong password for the MySQL `root` user.

