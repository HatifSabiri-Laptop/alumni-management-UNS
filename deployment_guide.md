# Step-by-Step Railway Deployment Guide 🚀

This guide will walk you through exactly how to move your Laravel application from your local computer to the live web using **Railway.app**.

---

## Phase 1: Prepare Your Code (Git)
Railway deploys your code by connecting to your GitHub account.

1.  **Commit your changes**: Make sure all our fixes are saved in Git.
    - Open your terminal and run:
      ```bash
      git add .
      git commit -m "Final fixes and Railway preparation"
      git push origin main
      ```
    *(If you haven't set up GitHub yet, create a new repository on [GitHub](https://github.com/new) and follow their instructions to upload your code.)*

---

## Phase 2: Create a Railway Project
1.  Go to [Railway.app](https://railway.app/) and log in with your GitHub account.
2.  Click the **"+ New Project"** button (usually in the top right).
3.  Select **"Deploy from GitHub repo"**.
4.  Choose your repository from the list.
5.  Click **"Deploy Now"**.
    - *Don't worry if it fails the first time!* We still need to add the Database and Environment Variables.

---

## Phase 3: Add the MySQL Database
1.  On your Railway project dashboard, click **"+ Add"** -> **"Service"** -> **"Database"** -> **"Add MySQL"**.
2.  Wait a few seconds for Railway to set up the database.
3.  Once ready, click on the **MySQL** service, go to the **Connect** tab, and keep those values handy (or just use the "Variables" instructions in the next phase).

---

## Phase 4: Configure Environment Variables
This is the most important part!
1.  Click on your **Application Service** (the one with your repo name).
2.  Click the **"Variables"** tab.
3.  Click **"+ New Variable"** or **"Raw Editor"** and add these values:

### Laravel Core
- `APP_ENV`: `production`
- `APP_KEY`: *(Get this from your local `.env` file)*
- `APP_DEBUG`: `false`
- `QUEUE_CONNECTION`: `database`

### Database (The Easiest Way)
Instead of adding 5 different variables, just add this **ONE** variable to your App service. It is much more reliable:

| Variable | Value (Copy & Paste exactly) |
| :--- | :--- |
| `DB_URL` | `${{MySQL.MYSQL_URL}}` |

*Note: If you use `DB_URL`, you can **delete** the other DB_HOST, DB_PORT, etc. variables.*

### Cloudinary
- `CLOUDINARY_CLOUD_NAME`: *(Your cloud name)*
- `CLOUDINARY_API_KEY`: *(Your API key)*
- `CLOUDINARY_API_SECRET`: *(Your API secret)*

---

## Phase 5: Go Live!
1.  **Correct the Build Command**:
    - Go to your application service -> **Settings** -> **Build Command**.
    - If you added `php artisan migrate` there, **REMOVE IT**.
    - The Build Command should only be: `npm run build` (if you use Vite) or leave it **Empty**.
    - *Why?* The database is not yet ready during the "Build" step.

2.  **Automatic Migrations (Procfile)**:
    - I have updated your `Procfile` to run `php artisan migrate --force` automatically every time the app starts. This is the correct way to do it on Railway.

3.  **Get your URL**:
    - Go to **Settings** -> **Public Networking**.
    - Click **"Generate Domain"** if you haven't yet.
    - Your app should now deploy successfully!

---

## 🛠 Troubleshooting
- **Website says "404" or "Forbidden"?** Make sure you generated a domain in Settings.
- **Emails not sending?** Make sure the `worker` process in the `Procfile` is running. You can see this in the **Deployments** tab.
