
# Stream Project - Front-End Guide

Welcome to the Stream project! This guide will help you set up and work on the front-end of our Laravel application using React and Inertia.

## Setup

1. Clone the repository:
   
   git clone [repository-url]
   cd stream
   

2. Install PHP dependencies:
   
   composer install
   

3. Install Node.js dependencies:
   
   npm install
   

4. Copy the .env.example file to .env and configure it as needed.

5. Generate an application key:
   
   php artisan key:generate
   

## Development Workflow

As a front-end developer, you'll primarily work with React components and Inertia. Here's what you need to know:

- React components are located in `resources/js/Pages` and `resources/js/Components`.
- To start the development server:
  
  npm run dev
  
- Make changes to the React components as needed.
- Inertia handles the communication between the front-end and back-end. You don't need to worry about API calls.
- Use TypeScript for type safety. The project is configured to use it.
- Tailwind CSS is set up for styling. Customize the `tailwind.config.js` file as needed.

## Key Files and Directories

- `resources/js/Pages`: Contains the main page components
- `resources/js/Components`: Reusable React components
- `resources/js/Layouts`: Layout components
- `resources/css/app.css`: Main CSS file (using Tailwind)
- `routes/web.php`: Defines the routes (for reference)

## Building for Production

When you're ready to build for production:


npm run build


This will compile and optimize all assets for production use.

## Notes

- You don't need to modify any PHP files or work with Laravel directly. Focus on creating and improving React components and their interactions.
- Use Inertia's `Link` component for internal navigation.
- Refer to the Inertia documentation for advanced usage: https://inertiajs.com/

Happy coding!
