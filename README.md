## Access Control List (ACL) system

This is a Laravel-based application that provides a user management system with role-based permissions. It allows administrators to:

-   **Manage Users**: Create, update, and delete user accounts.
-   **Assign Roles**: Define roles (e.g., Admin, Editor, Viewer) and assign them to users.
-   **Control Permissions**: Grant or restrict access to specific features based on user roles.
-   **Dynamic Permissions**: Assign permissions dynamically to users or groups.

The application is built with Laravel for the backend and MySQL for the database. It includes features like authentication, authorization and simple user interface.

## Installation

Follow these steps to set up the application on your local machine.

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/your-username/acl-sys.git
cd acl-sys
```

### 2. Install Dependencies

Install PHP dependencies using Composer:

```bash
composer i
```

Install JavaScript dependencies using npm:

```bash
npm i
```

### 3. Set Up Environment File

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Update the `.env` file with your database credentials:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Run Migrations and Seeders

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

Seed the database with initial data (e.g., roles, permissions, and a default admin user):

```bash
php artisan db:seed
```

### 5. Complie Assets

Compile the frontend assets (CSS, JavaScript) using Vite:

```bash
npm run build
```

### 6. Start the Development Server

```bash
php artisan serve
```

Visit the application in your browser at [http://localhost:8000](http://localhost:8000).

## Usage

Access the application:

-   open your browser at [http://localhost:8000](http://localhost:8000).
-   Log in with the default admin credentials:
    -   **Email**: admin@gmail.com
    -   Password: 12345

## Code Examples

### Policies

Policies are used to authorize user actions. For example, the UserPermissionPolicy checks if a user can update permissions:

```php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPermissionPolicy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        return $user->permissions->contains('slug', 'update-user-permissions');
    }
}
```

### Using Policies in Controllers

Use the `authorize` method in controllers to check permissions:

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->authorize('update', 'UserPermission');
        // Logic to update permissions
    }
}
```

### Using Policies in Blade Templates

Use the `@can` directive in Blade templates to conditionally display UI elements:

```php
@can('update', 'UserPermission')
    <a href="{{ route('user-permissions.edit', $id) }}" class="btn btn-warning">Edit Permissions</a>
@endcan
```
