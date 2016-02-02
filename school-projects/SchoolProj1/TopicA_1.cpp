/*****************************
	Casey Jones
	CS M10A
	Topic A Project First Program
	TopicA_1.cpp
	Status: working
	************************/

#include <iostream>

using namespace std;

int main()
{
	double cost;
	int tickets;

	cout << "How much was spent: (no $ sign) ";
	cin >> cost;

	if (cost < 10.00)
		tickets = 1;
	else if (cost < 20.00)
		tickets = 2;
	else if (cost < 30.00)
		tickets = 3;
	else
		tickets = 4;

	cout << "The number of tickets to be issued is " << tickets << endl;

	return 0;
}

/*
*
*If the customer spends this much ///// This many tickets are given
*										
*		$5.35										1
*
*		$10.00										2
*
*		$18.00										2
*
*		$25.76										3
*
*		$30.01										4
*
*/
