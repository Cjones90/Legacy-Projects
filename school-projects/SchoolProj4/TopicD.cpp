/******************************
	Casey Jones
	CSM10A
	Topic D Project
	TopicD.cpp
	Status: Working
********************************/

#include <iostream>
#include <fstream>		// For input file stream

using namespace std;

int main() {

	ifstream inputFile("random.txt");		// Open random.txt to read numbers
	
	// If random.txt is not present, close program
	if(inputFile.fail()) {
		cout << "Cannot open random.txt.  Program ending\n\n";
		cout << "Press Enter to end -->  ";
		cin.get();
		return 0;
	}

	int firstNum = 0, maxNum = 0, minNum = 0, tempNum = 0,			// Declare variables 		
		averageNum = 0, sumNum = 0, totalNum = 0;		

	// Retrieve first value and assign firstNum to max, min, sum, and increment total by 1
	inputFile >> firstNum;
	maxNum = firstNum,
	minNum = firstNum,
	sumNum = firstNum,
	totalNum += 1;

	while (inputFile >> tempNum) {
		//Test if input is greater than currnet max number
		if(tempNum > maxNum){
			maxNum = tempNum;
		}

		//Test if input is less than current min number
		if(tempNum < minNum) {
			minNum = tempNum;
		}

		//Sum numbers into an accumulator
		sumNum += tempNum;

		//Add to total count of inputs
		totalNum += 1;
	}
	// Close file
	inputFile.close();	

	// Get average of all numbers
	averageNum = sumNum / totalNum;				
	
	bool flag = true;	// Initialize flag to true to start menu
	char choice;

	// While choice is not to end the program
	while (flag) {
			
		// Display menu
		cout << "Make a selection from the list" << endl <<
			"A.  Get the largest value" << endl <<
			"B.  Get the smallest value" << endl <<
			"C.  Get the sum of the values" << endl <<
			"D.  Get the average" << endl <<
			"E.  Get the number of values entered" << endl <<
			"F.  End this program\n" << endl;

		// Get choice
		cout << "Enter your choice -->  ";
		cin >> choice;								
		cout << "\n";						

		// Display values depending on user's choice
		switch(choice) {
			case 'a': 
			case 'A': cout << "The largest value is " << maxNum << ".\n\n";
						break;
			case 'b':
			case 'B': cout << "The smallest value is " << minNum << ".\n\n";
						break;
			case 'c':
			case 'C': cout << "The sum of the values entered is " << sumNum << ".\n\n";
						break;
			case 'd':
			case 'D': cout << "The average of the values entered is " << averageNum << ".\n\n";
						break;
			case 'e':
			case 'E': cout << "The number of the values entered is " << totalNum << ".\n\n";
						break;
			case 'f':
			case 'F': flag = false;
						break;
			default: cout << choice << " is an invalid value" << ".\n\n";
		}
	}
	cin.ignore();
	cout << "Program ending\n\n";
	cout << "Press Enter to end -->  ";
	cin.get();
	return 0;	
}