function calculateTax() {
  const income = parseFloat(document.getElementById("income").value);

  if (isNaN(income)) {
    document.getElementById("result").innerHTML =
      "Please enter a valid income.";
    return;
  }

  let tax = 0;

  if (income <= 1200000) {
    tax = 0.0;
  } else if (income > 1200000 && income <= 1700000) {
    tax = (income - 1200000) * 0.06;
  } else if (income > 1700000 && income <= 2200000) {
    tax = (income - 1700000) * 0.12 + 30000.0;
  } else if (income > 2200000 && income <= 2700000) {
    tax = (income - 2200000) * 0.18 + 90000.0;
  } else if (income > 2700000 && income <= 3200000) {
    tax = (income - 2700000) * 0.24 + 180000.0;
  } else if (income > 3200000 && income <= 3700000) {
    tax = (income - 3200000) * 0.3 + 300000.0;
  } else if (income > 3700000) {
    tax = (income - 3700000) * 0.36 + 450000.0;
  }

  //  else if (income <= 5000000) {
  //   tax = 300000 + (income - 4000000) * 0.18;
  // }
  //  else if (income <= 6000000) {
  //   tax = 420000 + (income - 5000000) * 0.24;
  // }
  //  else {
  //   tax = 540000 + (income - 6000000) * 0.24;
  // }

  document.getElementById("result").innerHTML =
    "Income Tax: LKR " + tax.toFixed(2);
  document.getElementById("result-02").innerHTML =
    "Quarter Tax: LKR " + (tax / 4).toFixed(2);
}
