# Database Login Credentials

## phpMyAdmin Access

### Updated Login Information:
- **URL:** http://localhost/phpmyadmin/
- **Username:** `root`
- **Password:** `admin123`
- **Database:** `hbctrh_bloodbank`

## Application Database Connection

The blood bank application now uses the updated credentials:
- **Host:** localhost
- **Username:** root
- **Password:** admin123
- **Database:** hbctrh_bloodbank

## Security Notes

### For Development:
- The password `admin123` is set for easy development access
- This allows phpMyAdmin to work with password authentication
- All application files have been updated with the new password

### For Production:
- Change the MySQL root password to something secure
- Update the password in `db_connect.php/db_connect.php`
- Consider creating a dedicated database user with limited privileges
- Disable phpMyAdmin or restrict access in production

### Database Tables Available:
- `donors` - Donor information
- `blood_inventory` - Blood stock levels
- `blood_donations` - Donation records
- `blood_requests` - Hospital requests
- `staff` - System users
- `blood_transactions` - Blood transactions

### Quick Access Commands:

**Command Line:**
```bash
sudo mysql -u root -padmin123 hbctrh_bloodbank
```

**Test Connection:**
```bash
php -c /dev/null -r "include 'db_connect.php/db_connect.php'; echo 'Connection Status: ' . (\$conn ? 'Connected' : 'Failed') . PHP_EOL;"
```

The database connection is now properly configured and accessible through phpMyAdmin.
