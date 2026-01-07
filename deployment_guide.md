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

### Database (Railway Magic)
You don't need to copy-paste passwords! Just use these "reference" values:
- `DB_CONNECTION`: `mysql`
- `DB_HOST`: `${{MySQL.MYSQL_HOST}}`
- `DB_PORT`: `${{MySQL.MYSQL_PORT}}`
- `DB_DATABASE`: `${{MySQL.MYSQL_DATABASE}}`
- `DB_USERNAME`: `${{MySQL.MYSQL_USER}}`
- `DB_PASSWORD`: `${{MySQL.MYSQL_PASSWORD}}`

### Cloudinary
- `CLOUDINARY_CLOUD_NAME`: *(Your cloud name)*
- `CLOUDINARY_API_KEY`: *(Your API key)*
- `CLOUDINARY_API_SECRET`: *(Your API secret)*

---

## Phase 5: Go Live!
1.  After adding the variables, Railway will automatically start a new deployment.
2.  **Run Migrations**: 
    - Go to your application service -> **Settings** -> **Build Command**.
    - Change it to: `php artisan migrate --force && npm run build` (if you use Vite) or just ensure migrations run.
    - Alternatively, go to the **Deployments** tab, click the three dots on the latest deployment, and select **"View Logs"** to see if it's running.
3.  **Get your URL**:
    - Go to **Settings** -> **Public Networking**.
    - Click **"Generate Domain"**.
    - You now have a live website link!

---

## 🛠 Troubleshooting
- **Website says "404" or "Forbidden"?** Make sure you generated a domain in Settings.
- **Emails not sending?** Make sure the `worker` process in the `Procfile` is running. You can see this in the **Deployments** tab.
