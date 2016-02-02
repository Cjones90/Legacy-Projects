/******************************
	Casey Jones
	CSM10A
	Topic E Project
	TopicE.cpp
	Status: Working
	For Extra Credit II

	Program follows all criteria:
	- No global variables
	- Produces exact output as specified (including weird infinite loop I do not 
		know how to combat due to multiple inputs, for example: gfdh )
	- Has loop to allow input and calculation to happen multiple times
	- Function that gets user input. Gets both input values, validates them, and returns
		them via reference parameters
	- Same function also asks the user if they wish to continue and returns
		true or false depending on the users answer and is returned via the return statement

********************************/

#include <iostream>
#include <cmath>		// for pow()
using namespace std;

// Function declarations
bool kineticEnergy(double &, double &);
void loop();

int main() {

	//Loop in main that allows user to enter input values and calculation multiple times
	loop();

	// Program exiting
	cout << "\n\nProgram over\n";
	cout << "Press Enter to end -->";
	cin.ignore();
	cin.get();

	return 0;
}

// Loop function. Loops as long as user wishes to continue with program
void loop() {

	bool flag = false;  // Created loop due to the constraint of no global variables, would not
						// let flag be declared inside the do{} statement.
	do {
		double m, v, KE;

		// Adjusts flag depending on what value kineticEnergy returns, true of false.
		flag = kineticEnergy(m, v);

		/// If true (user chose to continue) evaluate and display output
		if (flag) {
			KE = .5 * m * pow(v, 2.0);
			cout << "\nThe kinetic energy of an object with mass " << m << " kilograms\n"
			<< " and a velocity of " << v << " meters per second is " << KE << "";
		}

		// Continue while user chooses to continue
	} while (flag);
}

// Input function. Retrieves user input, validates it, returns it, and the function
// returns true or false depending on user choice
bool kineticEnergy(double &m, double &v) {
		
	char choice;

	// User input
	cout << "\n\nDo you wish to enter values: (Y or n):   ";
	cin.get(choice);

	//Exit and return false if 'n' or 'N', breaking loop() and exiting program
	if (choice == 'n' || choice == 'N') {
		return false;
	}

	// Get mass, looping to obtain valid input
	do {
		cout << "Please enter a value of at least 1.5 kilograms for the mass:  ";
		cin >> m;
		cin.ignore();
		if (m < 1.5) {
			cout << m << " is an invalid value. Please re-enter\n";
		}
	} while (m < 1.5);
		
	// Get velocity, looping to obtain valid input
	do {
		cout << "Please enter a value of at least 5 meters per second for the velocity:  ";
		cin >> v;
		cin.ignore();
		if (v < 5) {
				cout << v << " is an invalid value. Please re-enter\n";
		}
	} while (v < 5);

	// User chose to continue, return true to continue loop()
	return true;
}