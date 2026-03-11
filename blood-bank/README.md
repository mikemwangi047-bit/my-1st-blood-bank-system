# Homa Bay County Blood Bank Management System

## Local Setup Instructions

### Prerequisites
- Apache2 web server
- PHP 8.3+
- MariaDB/MySQL database
- Web browser

### Database Setup
1. Database is already configured with the name `hbctrh_bloodbank`
2. Tables have been created with proper schema
3. Default admin credentials: username `admin`, password `admin123`

### Access the Application

#### Method 1: Web Browser (Recommended)
Open your web browser and navigate to:
```
http://localhost/blood-bank/index.php/
```

#### Method 2: Direct File Access
```
http://localhost/blood-bank/
```

### Application Features

#### Main Pages:
- **Dashboard**: Overview statistics and navigation
- **Register Donor**: Add new blood donors to the system
- **View Donors**: Browse and manage registered donors
- **Blood Stock**: Monitor blood inventory levels
- **Requests**: Handle blood requests from hospitals

#### Database Tables:
- `donors` - Donor information and demographics
- `blood_inventory` - Blood stock levels by type
- `blood_donations` - Donation records
- `blood_requests` - Hospital blood requests
- `staff` - System users and roles
- `blood_transactions` - Blood issue tracking

### Testing the System

1. **Register a Test Donor:**
   - Navigate to Register Donor page
   - Fill in donor information
   - Select blood group from all 8 types (A+, A-, B+, B-, O+, O-, AB+, AB-)

2. **View Blood Inventory:**
   - Go to Blood Stock page
   - See real-time stock levels with color-coded status
   - Green: Available, Orange: Low Stock, Red: Out of Stock

3. **Browse Donors:**
   - Visit View Donors page
   - See all registered donors in a table format

### Database GUI Options

#### Option 1: phpMyAdmin (Recommended)
If phpMyAdmin is installed:
```
http://localhost/phpmyadmin/
```
- Database: `hbctrh_bloodbank`
- Username: `root`
- Password: (empty)

#### Option 2: Command Line
```bash
sudo mysql -u root hbctrh_bloodbank
```

#### Option 3: Web-based SQL Interface
You can create SQL queries through the PHP files or use any database management tool.

### File Structure
```
blood-bank/
├── bloodbank/           # Main application pages
│   ├── dashboard.php
│   ├── register_donor.php
│   ├── view_donors.php
│   ├── blood_stock.php
│   └── requests.php
├── db_connect.php/      # Database connection
├── index.php/          # Login/landing page
└── database_schema.sql  # Database schema file
```

### Security Notes
- Uses prepared statements to prevent SQL injection
- Input sanitization implemented
- Database connection properly configured
- For development use only - secure passwords for production

### Troubleshooting
- If pages don't load: Check Apache2 status with `sudo systemctl status apache2`
- If database errors: Verify MariaDB is running with `sudo systemctl status mariadb`
- For permission issues: Ensure www-data owns the web directory

### Development Notes
- All PHP files use the centralized database connection
- Error handling implemented throughout
- Responsive design with Bootstrap CSS
- Real-time data updates
