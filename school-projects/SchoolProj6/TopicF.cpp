/***********************
	Casey Jones
	CSM10A
	TopicF.ccp
	Topic F Project
	Status: Complete

*****************************/

#include <iostream>
#include <fstream>
#include <vector>

using namespace std;


int readInput(vector<int> &, int &);
void copy(const vector<int> &, int []);
void sort(int [], const int);
void calculateMode(int arr[], const int, int &, int &);
void writeToFile(vector<int> &, ofstream &);
void writeToFile(int arr[], const int, ofstream &);


int main() {

	vector<int> vect;
	int vectSize;
	int average = 0, mode = 0, maxCount = 0;
	ofstream outFile("output.txt");

	int total = readInput(vect, vectSize);

	if (total == 0){
		cout << "Cannot open TopicFin.txt.  Program ending\n\n";
		cout << "Press Enter to end -->  ";
		cin.get();
		return 0;
	}

	average = (total / vectSize);

	const int SIZE = vectSize;
	int arr[SIZE];

	copy(vect, arr);
	sort(arr, SIZE);
	calculateMode(arr, SIZE, mode, maxCount);

	writeToFile(vect, outFile);
	outFile << "\n\n\nAverage of values is " << average << "\n\n\n";

	writeToFile(arr, SIZE, outFile);
	outFile << "\n\nThe mode of the values is " << mode << " which occurs " << maxCount << " times";

	outFile << "\n\n\nProgram Over";
	// cin.get();

	return 0;
}



int readInput(vector<int> &vect, int &size) {
	int total = 0;
	int temp = 0;
	ifstream inFile("TopicFin.txt");
	if(inFile.fail()) {
		return 0;
	}
	while(inFile >> temp) {
		total += temp;
		vect.push_back(temp);
	}
	inFile.close();
	size = vect.size();
	return total;
}

void copy(const vector<int> &vect, int arr[]) {
	for(int i = 0; i < vect.size(); i++) {
		arr[i] = vect[i];
	}
}

void sort (int arr[], const int SIZE) {

	for (int i = 0; i < (SIZE - 1); i++){
		int minVal = arr[i];
		int minInd = i;
		for (int index = (i + 1); index < SIZE ; index++){
			if (arr[index] < minVal) {
				minVal = arr[index];
				minInd = index;
			}
		}
		arr[minInd] = arr[i];
		arr[i] = minVal; 
	}
 }

void calculateMode (int arr[], const int SIZE, int &mode, int &maxCount) {

	int curNum = arr[0];
	mode = curNum;
	int count = 0;
	maxCount = 0;

	for (int i = 0; i < (SIZE - 1); i++) {
		if(arr[i] == curNum){
			count++;
		}
		else {
			if (count > maxCount){
				maxCount = count;
				mode = curNum;
			}
			curNum = arr[i];
			count = 1;
		}
	}
	
}

void writeToFile (vector<int> &vect, ofstream &outFile) {

	int size = vect.size();
	
	outFile << "The values read are:\n";

	for(int i = 0; i < size; i++) {
		outFile << vect[i] << " ";
		if ((i+1) % 15 == 0) {
			outFile << '\n';
		}
	}
}

void writeToFile (int arr[], const int SIZE, ofstream &outFile) {

	outFile << "The sorted result is:\n";

	for(int i = 0; i < SIZE; i++) {
		outFile << arr[i] << " ";
		if ((i+1) % 15 == 0) {
			outFile << '\n';
		}
	}
	int last = (SIZE-1);
	if (SIZE % 2 == 0) {
		outFile << "\n\n\nThe median of the values is: " << ( (arr[last/2] + arr[last/2 +1]) / 2 ) << endl;
	}
	else {
		outFile << "\n\n\nThe median of the values is: " << arr[last/2] << endl;
	}
}