function payroll() {
    hours = prompt("How many hours did the employee work (Enter -1 to stop)?")
    employees = []
    sum = 0
    while (isNaN(hours) || hours >= 0) {
        if (isNaN(hours)) {
            hours = prompt("Value entered is not a number.  How many hours did the employee work (Enter -1 to stop)?")
        } else {
            employees.push(hours)
            hours = prompt("How many hours did the employee work (Enter a negative to stop)?")
        }
    }

    table = document.getElementById("table_body")
    sum = 0
    for (i = 0; i < employees.length; i++) {
        row = table.insertRow()
        index = row.insertCell(0)
        hours = row.insertCell(1)
        total = row.insertCell(2)

        index.innerHTML = i + 1
        hours.innerHTML = (Math.round(employees[i] * 100) / 100).toFixed(2)
        if (employees[i] > 40) {
            pay = 40 * 15 + (employees[i] - 40) * 15 * 1.5
        } else {
            pay = employees[i] * 15
        }
        total.innerHTML = "$" + (Math.round(pay * 100) / 100).toFixed(2)
        sum += pay
    }
    document.getElementById("total_pay").innerHTML = "The total employee pay is: $" + (Math.round(sum * 100) / 100).toFixed(2)
}