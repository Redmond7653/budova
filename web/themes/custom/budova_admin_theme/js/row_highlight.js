(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const today = new Date();
    const todayStr = today.toISOString().split('T')[0]; // YYYY-MM-DD

    document.querySelectorAll('table.views-view-table tbody tr').forEach(row => {
      const dateCell = row.querySelector('td.views-field-field-ending');
      if (!dateCell) return;

      const dateText = dateCell.textContent.trim();
      const dateOnly = dateText.split(' ')[0];

      if (dateOnly === todayStr) {
        row.style.backgroundColor = '#ffe5e5';
      }
    });
  });
})();
