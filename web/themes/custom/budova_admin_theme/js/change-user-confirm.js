(function (Drupal, once) {
  Drupal.behaviors.changeUserConfirm = {
    attach: function (context, settings) {
      once('change-user-confirm', 'a[href^="/user/logout"]', context).forEach(function (el) {
        el.addEventListener('click', function (e) {
          const confirmed = confirm('Ви точно хочете змінити користувача?');
          if (!confirmed) {
            e.preventDefault();
          }
        });
      });
    }
  };
})(Drupal, once);


(function () {
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('li.menu-item').forEach(function (li) {
      const link = li.querySelector('a[href^="/user/logout"]');
      if (link && link.textContent.trim().includes('Змінити користувача')) {
        li.style.backgroundColor = 'rgb(169 198 247)';
      }
    });
  });
})();
