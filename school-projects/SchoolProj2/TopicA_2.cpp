/* ************************************
	Casey Jones
	CSM10A
	Topic A Project Second Program
	TopicA_2.cpp
	Status: Working
***********************************/

#include <iostream>

using namespace std;

int main()
{
	double item1 = 15.95,
			item2 = 24.95,
			item3= 6.95, 
			item4 = 12.95, 
			item5= 3.95;

	const float salesTax = 0.07F;

	double subtotal = item1 + item2 + item3 + item4 + item5;
	double taxAmount = subtotal * salesTax;
	double total = subtotal + taxAmount;

	cout << "The items are:\n" <<
			"Item 1 = $" << item1 << "\n" <<
			"Item 2 = $" << item2 << "\n" <<
			"Item 3 = $" << item3 << "\n" <<
			"Item 4 = $" << item4 << "\n" <<
			"Item 5 = $" << item5 <<  "\n\n";

	cout << "The sub total is:              $" << subtotal << "\n\n";

	cout << "The tax is:                    $" << taxAmount << "\n\n";

	cout << "The total cost is:             $" << total << "\n\n\n";

	cout << "Program Over \n\n\n";

	return 0;
}