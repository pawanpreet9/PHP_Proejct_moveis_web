# Blockbuster Pictures Production - Movie Selling Website

This project is a **content management system (CMS)** for **Blockbuster Pictures Production**, designed to facilitate online movie sales and management. Authorized users such as employees (e.g., marketers, content creators) can manage the movie database without needing IT support. The website will allow users to add, edit, and delete movie information and display it on a user-friendly interface.

## Table of Contents

- [Introduction](#introduction)
- [Objectives](#objectives)
- [Features](#features)
- [Database Structure](#database-structure)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)
- [Contact](#contact)

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
