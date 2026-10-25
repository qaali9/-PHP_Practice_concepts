<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

function calculateDeposit($openingBalance, $amount) {
    return $openingBalance + $amount;
}

function calculateWithdrawal($openingBalance, $amount) {
    return $openingBalance - $amount;
}

function calculateTransactionFee($transactionType, $amount) {
    if ($transactionType == "Deposit") {
        return 0;
    } elseif ($transactionType == "Withdrawal" && $amount < 500) {
        return 2;
    } elseif ($transactionType == "Withdrawal" && $amount >= 500) {
        return 5;
    } else {
        return 0;
    }
}


function calculateInterest($finalBalance, $accountType, $years) {
    if ($accountType == "Savings") {
        $rate = 0.03;
    } elseif ($accountType == "Current") {
        $rate = 0.05;
    } elseif ($accountType == "Business") {
        $rate = 0.02;
    } else {
        $rate = 0;
    }
    return $finalBalance * $rate * $years;
}

function calculateTotalCharges($transactionFee) {
    return $transactionFee;
}


function calculateFinalBalance($openingBalance, $amount, $transactionType, $totalCharges) {
    if ($transactionType == "Deposit") {
        return calculateDeposit($openingBalance, $amount) - $totalCharges;
    } else {
        return calculateWithdrawal($openingBalance, $amount) - $totalCharges;
    }
}

function checkAccountStatus($finalBalance) {
    if ($finalBalance >= 5000) {
        return "High Balance";
    } elseif ($finalBalance >= 1000) {
        return "Medium Balance";
    } else {
        return "Low Balance";
    }
}

function calculateFutureBalance($finalBalance, $accountType, $years = 1) {
    $interest = calculateInterest($finalBalance, $accountType, $years);
    return $finalBalance + $interest;
}
?>

</body>
</html>