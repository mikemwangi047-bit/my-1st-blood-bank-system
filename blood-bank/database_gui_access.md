# Database GUI Access Guide

## phpMyAdmin is now installed and accessible! 🎉

### Access phpMyAdmin:
```
http://localhost/phpmyadmin/
```

### Login Credentials:
- **Username:** `root`
- **Password:** (leave empty)
- **Database:** `hbctrh_bloodbank`

## Alternative Database Access Methods:

### 1. Command Line Access
```bash
sudo mysql -u root hbctrh_bloodbank
```

### 2. Web-based Database Browser
Your blood bank application already has built-in database viewing:
- **View Donors:** http://localhost/blood-bank/bloodbank/view_donors.php
- **Blood Stock:** http://localhost/blood-bank/bloodbank/blood_stock.php

### 3. SQL Commands via Terminal
```bash
# Connect to database
sudo mysql -u root hbctrh_bloodbank

# View all tables
SHOW TABLES;

# View donors
SELECT * FROM donors;

# View blood inventory
SELECT * FROM blood_inventory;
```

## Database Schema Overview:

### Main Tables:
- **donors** - Donor registration and information
- **blood_inventory** - Current blood stock levels
- **blood_donations** - Donation history
- **blood_requests** - Hospital requests
- **staff** - System users
- **blood_transactions** - Blood issue tracking

### Quick SQL Queries:
```sql
-- Check total donors
SELECT COUNT(*) FROM donors;

-- Check blood stock levels
SELECT blood_group, units_available FROM blood_inventory;

-- View recent donations
SELECT * FROM blood_donations ORDER BY donation_date DESC;

-- View pending requests
SELECT * FROM blood_requests WHERE status = 'Pending';
```

## Security Notes:
- phpMyAdmin provides full database management capabilities
- Use with caution in production environments
- Current setup is for development/testing only
- Consider restricting access in production deployments

## Troubleshooting:
If phpMyAdmin doesn't load:
1. Check Apache status: `sudo systemctl status apache2`
2. Restart Apache: `sudo systemctl restart apache2`
3. Verify installation: `dpkg -l | grep phpmyadmin`
