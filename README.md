# Miparti Dance Studio Website

<div align="center">
  <img src="https://img.shields.io/badge/WordPress-Latest-blue?logo=wordpress" alt="WordPress">
  <img src="https://img.shields.io/badge/PHP-7.4+-blue?logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/CSS3-Latest-blue?logo=css3" alt="CSS3">
</div>

## 🌍 Demo

Explore the live demo of Miparti Frontend to experience its features firsthand:

- **Live Demo**: [miparti](https://andrey-golubenko.github.io/miparti-frontend)

## 🎯 Core Features

- **Responsive Dance Studio Website**
  - Adaptive layouts for all devices (mobile, tablet, desktop)
  - Interactive dance class schedules
  - Dynamic photo and video galleries
  - Performance showcase sections
  - Seamless navigation experience
  - Optimized image loading for fast performance
  - Mobile-first approach with touch-friendly interfaces
  - Custom animations and transitions
- **Custom WordPress Theme**
  - Optimized performance
  - Mobile-first design
  - Custom navigation menus
- **Content Management**
  - Dance class descriptions
  - Video gallery
  - Performance staging information
- **Security Enhancements**
  - WordPress version concealment
  - Removed default WordPress files
  - Custom login error messages
  - Disabled XML-RPC

## 🛠️ Technical Features

### ➤ WordPress Customizations

- **Custom Navigation Menus**
  - Separate menus for front page and other pages
  - Custom styling with hover effects
- **Security Optimizations**
  - Removal of WordPress version information
  - Disabled emoji scripts
  - Removed license.txt and readme.html
  - Custom login error messages

### ➤ Technology Stack

- **WordPress Core**
- **PHP 7.4+**
- **Custom CSS Architecture**
  - Responsive design
  - Mobile-first approach
  - Custom font implementation (Lora)
- **JavaScript Enhancements**
  - Magnific Popup integration
  - Custom animations

## ⭐ Production Website

Experience our dance studio website in action:

- **Live Website**: [Miparti Dance Studio](https://www.miparti.com.ua/)

## 🔧 Theme Structure

```plaintext
miparti-full-stack/
├── assets/                               # Static resources directory
│   ├── css/                              # Stylesheet files and their minified versions
│   │   ├── about.min.css
│   │   ├── admin-custom-fields.css
│   │   ├── contact-forms-ajax-request.css
│   │   ├── front-page.min.css
│   │   ├── mobile-front-page.min.css
│   │   ├── school.min.css
│   │   └── studio.min.css
│   ├── fonts/                             # Custom web fonts for typography
│   ├── images/                            # Media assets and graphics
│   │   ├── Various JPG/JPEG images        # Dance studio photography
│   │   ├── SVG assets                     # Vector graphics and icons
│   │   └── Background and logo files      # Brand assets
│   └── js/                                # JavaScript functionality files
├── inc/ # Core functionality includes
│   ├── breadcrumbs-handler.php            # Navigation breadcrumbs logic
│   ├── class-miparti-recent-posts-widget.php # Custom widget implementation
│   ├── contact-forms.php                   # Contact form processing
│   ├── custom-fields.php                   # Custom field definitions
│   ├── custom-post-types.php               # Custom post type registration
│   ├── customizer.php                      # Theme customizer settings
│   ├── menu.php                            # Navigation menu configuration
│   └── search-group.php                    # Search functionality
├── template-parts/                         # Reusable template components
│   ├── breadcrumbs.php                     # Breadcrumb navigation template
│   ├── content-none.php                    # No content found template
│   └── content-search.php                  # Search results template
├── Main PHP Templates                      # Primary template files
│   ├── 404.php                             # Error page template
│   ├── about.php                           # About page template
│   ├── blog.php                            # Blog listing template
│   ├── contacts.php                        # Contact page template
│   ├── countries-images.php                # Country gallery template
│   ├── footer.php                          # Footer template
│   ├── front-page.php                      # Homepage template
│   ├── functions.php                       # Theme functions
│   ├── header.php                          # Header template
│   ├── index.php                           # Main template file
│   ├── rider.php                           # Rider page template
│   ├── school.php and related files        # School section templates
│   ├── studio.php and related files        # Studio section templates
│   └── Other template files                # Additional page templates
├── style.css                               # Main stylesheet
└── robots.txt                              # Search engine directives
```

## 🚀 Installation

1. Install WordPress on your server
2. Upload the theme to `wp-content/themes/`
3. Activate the theme through WordPress admin panel
4. Configure menus:
   - Create front page menu
   - Create common pages menu
5. Set up featured images for posts

## 💫 Key Components

### CSS Components
- Responsive typography with Lora font
- Custom description blocks
- Video gallery styling
- Dance staging sections
- Mobile-optimized layouts

### WordPress Functions
- Custom menu registration
- Security enhancements
- Performance optimizations
- Custom error messages

## 📜 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.