<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Pages - ReportEase</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px 0;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .section {
            margin-bottom: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .section-title {
            background: linear-gradient(135deg, #333, #555);
            color: white;
            padding: 15px 20px;
            font-size: 1.3rem;
            font-weight: bold;
        }
        
        .pages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
            padding: 20px;
        }
        
        .page-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .page-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border-color: #ff6b35;
        }
        
        .page-card h3 {
            color: #ff6b35;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        
        .page-card p {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        
        .page-link {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .page-link:hover {
            transform: scale(1.05);
            box-shadow: 0 3px 10px rgba(255, 107, 53, 0.3);
        }
        
        .page-url {
            font-family: 'Courier New', monospace;
            background: #f8f9fa;
            padding: 5px 8px;
            border-radius: 3px;
            font-size: 0.8rem;
            color: #666;
            margin-top: 10px;
            display: block;
            word-break: break-all;
        }
        
        .navigation {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navigation a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 25px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .navigation a:hover {
            background: #555;
            transform: translateY(-2px);
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 25px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 ReportEase - All Pages</h1>
            <p>Complete overview of all available pages in the application</p>
            <div class="stats">
                @php $totalPages = 0; @endphp
                @foreach($pages as $category => $pageList)
                    @php $totalPages += count($pageList); @endphp
                @endforeach
                <div class="stat-item">
                    <span class="stat-number">{{ $totalPages }}</span>
                    <span class="stat-label">Total Pages</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ count($pages) }}</span>
                    <span class="stat-label">Categories</span>
                </div>
            </div>
        </div>

        @foreach($pages as $category => $pageList)
        <div class="section">
            <div class="section-title">
                {{ $category }} ({{ count($pageList) }} pages)
            </div>
            <div class="pages-grid">
                @foreach($pageList as $page)
                <div class="page-card">
                    <h3>{{ $page['name'] }}</h3>
                    <p>{{ $page['description'] }}</p>
                    <a href="{{ $page['url'] }}" class="page-link" target="_blank">
                        View Page →
                    </a>
                    <code class="page-url">{{ $page['url'] }}</code>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="navigation">
            <h3 style="margin-bottom: 20px; color: #333;">Quick Navigation</h3>
            <a href="/">🏠 Home</a>
            <a href="/login">🔐 Login</a>
            <a href="/register">📝 Register</a>
            <a href="/student/dashboard">👨‍🎓 Student Dashboard</a>
            <a href="/facultystaff/dashboard">👨‍🏫 Faculty Dashboard</a>
            <a href="/maintenancedep/dashboard">🔧 Maintenance Dashboard</a>
        </div>
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.page-card');
            
            cards.forEach(card => {
                card.addEventListener('click', function(e) {
                    if (e.target.tagName !== 'A') {
                        const link = this.querySelector('.page-link');
                        if (link) {
                            window.open(link.href, '_blank');
                        }
                    }
                });
            });

            // Add loading animation for links
            const links = document.querySelectorAll('.page-link');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    this.style.opacity = '0.7';
                    this.innerHTML = 'Loading...';
                });
            });
        });
    </script>
</body>
</html>
