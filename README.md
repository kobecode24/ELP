<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ELP (E-Learning Platform)

ELP is an innovative e-learning platform designed to provide comprehensive tutorials, interactive coding challenges, and real-time learning feedback, all in one place. Inspired by the best features of platforms like Udemy, W3Schools, and LeetCode, ELP aims to revolutionize the way we learn and practice coding.

## Features

- **Courses and Tutorials**: Comprehensive tutorials covering various programming languages and technologies.
- **Interactive Coding Challenges**: Solve coding problems and get instant feedback.
- **Real-Time Learning Feedback**: Get immediate responses to your solutions and improve your skills.
- **Media Management**: Utilize YouTube and Vimeo integrations for a rich multimedia learning experience.
- **Robust Code Compilation**: Leverage Sphere Engine Compiler API for reliable code execution and testing.

## Built With

- [Laravel](https://laravel.com/) - The PHP Framework for Web Artisans
- [PostgreSQL](https://www.postgresql.org/) - The World's Most Advanced Open Source Relational Database
- [TailwindCSS](https://tailwindcss.com/) - A utility-first CSS framework
- [Cloudinary](https://cloudinary.com/) - Cloud-based image and video management
- [Sphere Engine Compiler API](https://sphere-engine.com/) - Powerful online compiler for various programming languages
- [YouTube API](https://developers.google.com/youtube/v3) - For video content integration
- [Vimeo API](https://developer.vimeo.com/) - For video content integration
- [Heroku](https://www.heroku.com/) - Cloud platform for deploying, managing, and scaling apps

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- PostgreSQL

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/kobecode24/elp.git
   cd elp
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
The application will be available at http://localhost:8000 , or Visit www.elpcampus.tech to see the platform in live demo.

