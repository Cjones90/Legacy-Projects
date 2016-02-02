/******************************
	Casey Jones
	CSM10A
	Topic B Project
	TopicB.cpp
	Status: Working
********************************/

#include <iostream>
#include <cmath>       // For pow()
#include <iomanip>     // For setprecision, fixed, and showpoint

using namespace std;

int main() {

	// Declare variables to store user input and calculation
	// Who knew using float instead of double would cause such a headache, causing a 1 cent and 9 cent
	// difference on the test values, but fine for other example values -_-
	double loanAmt, monthAmt, yearIntRate, monthIntRate, remainBal, floatPayments;
	int numPayments;

	// Get loan amount
	cout << "Enter the original loan amount:  ";
	cin >> loanAmt;

	// Get number of payments made
	cout << "\nEnter the number of payments already made:  ";
	cin >> numPayments;

	// Get amount of monthly payment
	cout << "\nEnter the monthly payment amount:  ";
	cin >> monthAmt;

	// Get the yearly interest rate
	cout << "\nEnter the YEARLY interest rate as a percentage:  ";
	cin >> yearIntRate;

	cin.ignore();  // cin.ignore() used to skip '\n' for cin.get() below

	// Calculate monthly interest rate from user's yearly interest rate input
	monthIntRate = (yearIntRate / 12) / 100;

	// Quickest way I felt was to static cast the numPayments to floatPayments for the pow() function
	// instead of converting to float for pow() and back for display
	floatPayments = static_cast<double>(numPayments);

	// Do math
	remainBal = loanAmt * (pow(1 + monthIntRate, floatPayments)) - monthAmt *(((pow(1 + monthIntRate, floatPayments)) - 1) / monthIntRate);

	// Output the user's input for verification and display remaining
	// balance for the loan			// Book says setprec and fixed should be fine, added showpoint for edge cases
	cout << "Loan amount                    $" << setprecision(2) << fixed << showpoint << loanAmt << endl;
	cout << "Yearly interest rate            " << yearIntRate << "%\n";
	cout << "Number of payments made         " << numPayments << endl;  // The int version for number of payments
	cout << "Balance remaining              $" << remainBal << endl;

	cout << "\n\nProgram over - Press Enter to end";
	cin.get();  // Pause program

	return 0;
}