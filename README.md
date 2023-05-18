## About Atlas

An interactive real-time safety indicator web app

## Pusher

Sign up an account on [Pusher](https://pusher.com/) to get your PUSHER app keys

## Installation

1. Clone the repository to your preferred directory
```
git clone https://github.com/Jeppenseppiro/Tempestas.git
```

2. **Change Directory** to the location of the cloned repository
```
cd [folder name]
```

3. Rename the file **.env.example** to **.env**

4. Run the following commands
```
npm install && composer update --no-scripts
php artisan key:generate
```

## Configuration
1. **.env** file
  - Update the DB environment variables
  - Change **BROADCAST_DRIVER=log** to **BROADCAST_DRIVER=pusher**
  - Update the PUSHER environment variable referencing on the Pusher website App Keys menu

2. Run ``` php artisan migrate ``` to start the migration process and push the needed tables unto the database
3. Run ``` php artisan db:seed --class=LocationSeeder ``` to populate the **locations** table


## Running the App
> Open 2 terminals and run these commands separately each terminal
- Terminal 1: ``` php artisan serve ```
- Terminal 2: ``` npm run dev ```

## Technology
- **[Laravel](https://laravel.com/)**
- **[Vue](https://vuejs.org/)**
- **[Inertia](https://inertiajs.com/)**
- **[Vite](https://vitejs.dev/)**
- **[Pusher](https://pusher.com/)**
- **[Laravel Echo](https://github.com/laravel/echo)**
- **[Tailwind](https://tailwindcss.com/)**
- **[DaisyUI](https://daisyui.com/)**
