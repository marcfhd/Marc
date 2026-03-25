# TechHub - PC Equipment Store

TechHub is a modern e-commerce platform for premium PC equipment and gaming peripherals.

## 🎮 Features
- ✅ Responsive design for all devices
- ✅ Product showcase and browsing
- ✅ User signup functionality
- ✅ SEO optimized
- ✅ Fast performance with CDN resources
- ✅ Bootstrap 5.3.3 framework
- ✅ Font Awesome icons
- ✅ Dynamic navbar component

## 📁 Project Structure
```
Marc/
├── pages/
│   ├── home/
│   │   ├── index.html
│   │   ├── style.css
│   │   └── navbar.js
│   ├── products/
│   │   └── index.html
│   └── signup/
│       └── index.html
├── assets/
│   └── images/
│       ├── gpu.jpg
│       ├── keyboard.jpg
│       └── mouse.jpg
├── Layout/
├── images/
├── sitemap.xml
├── robots.txt
├── .gitignore
└── README.md
```

## 🚀 How to Run Locally

### Option 1: Live Server (Recommended)
1. Install "Live Server" extension in VS Code
2. Right-click on `pages/home/index.html`
3. Select "Open with Live Server"
4. Browser will open at `http://localhost:5500`

### Option 2: Python
```bash
cd c:\Users\USER\Desktop\Marc
python -m http.server 8000
```
Then open `http://localhost:8000/pages/home/index.html`

### Option 3: Node.js
```bash
npm install -g http-server
http-server
```
Then open `http://localhost:8080/pages/home/index.html`

## 🌐 Deployment Options

### GitHub Pages (Free & Recommended)
```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/Marc.git
git push -u origin main
```
Then enable GitHub Pages in repo settings.

### Netlify (Easy Setup)
1. Go to netlify.com
2. Drag and drop your `Marc` folder
3. Site goes live instantly with free SSL

### Vercel (Fast Performance)
1. Go to vercel.com
2. Import your GitHub repository
3. Automatic deployments on every push

## ⚙️ Configuration Before Going Live

### 1. Update Domain References
Replace `yourdomain.com` in:
- `sitemap.xml` - Change all URLs
- `pages/home/index.html` - Update canonical URL

### 2. Add Images
Create folder: `c:\Users\USER\Desktop\Marc\assets\images\`
Add these images:
- `gpu.jpg` - Gaming GPU product image
- `keyboard.jpg` - Mechanical keyboard image
- `mouse.jpg` - Gaming mouse image

### 3. Update Meta Tags
Edit `pages/home/index.html` and update:
- `og:url` property
- Canonical link
- Sitemap reference

## 📋 SEO Checklist
- ✅ Meta description
- ✅ Keywords
- ✅ Open Graph tags
- ✅ Canonical URLs
- ✅ robots.txt
- ✅ sitemap.xml
- ✅ Alt text on images
- ✅ Mobile responsive

## 🔧 Technologies Used
- **HTML5** - Semantic markup
- **CSS3** - Modern styling with variables
- **Bootstrap 5.3.3** - Responsive framework
- **Font Awesome 6.5.1** - Icon library
- **JavaScript** - Dynamic components
- **Unsplash CDN** - Product images

## 📱 Browser Support
- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers

## 🎨 Customization

### Color Scheme
Edit `pages/home/style.css`:
```css
:root {
  --primary-color: #007bff;
  --secondary-color: #6c757d;
  --success-color: #28a745;
  --danger-color: #dc3545;
  --light-bg: #f8f9fa;
  --dark-bg: #212529;
}
```

### Navigation Links
Edit `pages/home/navbar.js` to add/remove menu items

### Products
Update product cards in:
- `pages/home/index.html` (featured products)
- `pages/products/index.html` (all products)

## 📞 Contact & Support
For issues or improvements, submit an issue on GitHub.

## 📄 License
© 2026 TechHub. All Rights Reserved.

## 👤 Author
TechHub Development Team

---

**Last Updated:** March 25, 2026

**Version:** 1.0.0