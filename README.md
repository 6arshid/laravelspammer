# Laravel Spammer - Installation Guide

## Features

- **Send Bulk Emails**: Send emails to multiple recipients simultaneously.
- **Email Templates**: Easily manage and reuse email templates.
- **SMTP Configuration**: Flexible SMTP setup via `.env` file.
- **Mailing Lists**: Organize recipients into groups for targeted campaigns.
- **Sending Logs**: Track sent emails and view delivery status.
- **User Interface**: Simple dashboard to manage campaigns and templates.
- **Authentication**: Secure login system to restrict access.

## Requirements

- PHP 8.1+
- Composer
- Node.js & NPM
- Git
- MySQL or compatible database

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/6arshid/laravelspammer.git
cd laravelspammer
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Set Up Environment File

```bash
cp .env.example .env
```

Edit the `.env` file and update the following:
- Database credentials
- Mail (SMTP) settings
- App URL and name

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. (Optional) Seed Initial Data

```bash
php artisan db:seed
```

### 8. Serve the Application

```bash
php artisan serve
```

Access the application in your browser at:

```
http://localhost:8000
```

### 9. Compile Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

---

## Additional Notes

- Ensure `storage/` and `bootstrap/cache/` have proper write permissions.
- Make sure your SMTP service (e.g. Mailtrap, Gmail, Mailgun) is configured and allows bulk sending.
- This tool is for educational or testing purposes only. **Use responsibly.**

---

Happy Spamming! 📬 *(Ethically, of course!)*
