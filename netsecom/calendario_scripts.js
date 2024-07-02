document.addEventListener("DOMContentLoaded", function () {
    const calendarDates = document.getElementById("calendar-dates");
    const monthYear = document.getElementById("month-year");
    const prevMonthBtn = document.getElementById("prev-month");
    const nextMonthBtn = document.getElementById("next-month");
    const yearSelect = document.getElementById("year-select");
  
    let currentDate = new Date();
    let selectedDate = new Date(currentDate);
  
    function populateYearSelect() {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear - 50; i <= currentYear + 50; i++) {
        const option = document.createElement("option");
        option.value = i;
        option.innerText = i;
        yearSelect.appendChild(option);
      }
    }
  
    function renderCalendar(date) {
      const year = date.getFullYear();
      const month = date.getMonth();
      const firstDay = new Date(year, month, 1).getDay();
      const lastDate = new Date(year, month + 1, 0).getDate();
  
      monthYear.innerText = `${date.toLocaleString("default", {
        month: "long",
      })} ${year}`;
      calendarDates.innerHTML = "";
  
      for (let i = 0; i < firstDay; i++) {
        calendarDates.appendChild(document.createElement("div"));
      }
  
      for (let i = 1; i <= lastDate; i++) {
        const dateElement = document.createElement("div");
        dateElement.innerText = i;
        dateElement.classList.add("date");
        dateElement.addEventListener("click", function () {
          selectedDate = new Date(year, month, i);
          renderCalendar(date); // Re-renderizar el calendario para actualizar la selección
        });
  
        if (
          i === selectedDate.getDate() &&
          month === selectedDate.getMonth() &&
          year === selectedDate.getFullYear()
        ) {
          dateElement.classList.add("selected");
        }
  
        calendarDates.appendChild(dateElement);
      }
  
      yearSelect.value = year;
    }
  
    prevMonthBtn.addEventListener("click", function () {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
    });
  
    nextMonthBtn.addEventListener("click", function () {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
    });
  
    yearSelect.addEventListener("change", function () {
      const selectedYear = parseInt(yearSelect.value, 10);
      currentDate.setFullYear(selectedYear);
      renderCalendar(currentDate);
    });
  
    populateYearSelect();
    renderCalendar(currentDate);
  });