

<script>
      const currentPage = window.location.pathname.split('/').pop();
    document.querySelectorAll('.sidebar a, .submenu a').forEach(link => {
      link.classList.remove('active');
      link.style.backgroundColor = '';
      link.style.border = ''; // Clear border
      link.style.boxShadow = ''; // Clear glow effect
      link.style.color = '';
      link.style.fontWeight = '';
    });

    const allLinks = document.querySelectorAll('.sidebar a, .submenu a');
    allLinks.forEach(link => {
      const href = link.getAttribute('href');
      // Normalize href to handle relative paths by extracting the last segment
      const hrefPage = href ? href.split('/').pop() : '';
      if (href && (hrefPage === currentPage || (href === '#' && currentPage === 'logout.php'))) { // Handle sign-out link
        link.classList.add('active');
        link.style.backgroundColor = '#005B99'; // Dark blue background
        link.style.border = '2px solid #00FFFF'; // Cyan glowing border
        
       

        // If the active link is in a submenu, keep the parent submenu open
        const parentSubmenu = link.closest('.submenu');
        if (parentSubmenu) {
          parentSubmenu.classList.add('active');
          const parentToggle = parentSubmenu.previousElementSibling;
          if (parentToggle) {
            const parentIcon = parentToggle.querySelector('.dropdown-icon');
            if (parentIcon) {
              parentIcon.classList.add('active');
            }
          }
        }
      }
    });
</script>