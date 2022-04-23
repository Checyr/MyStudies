# OOP (Object Oriented Programming)

Object Oriented Programming is way to turn the things more simple and faster in OOP have classes, methods, inheritance, interface and more.


## Summary
- Fudamments of OOP
    - [What is OOP](docs/01-whatIsOOP.md)

## Class
Classes are 

## CREATING METHODS
For creating methods you first need to know what is a method in POO (Object Oriented Programming) and is simple methods are function inside of classes 

Example:


    class Item:
        def calculate_total_price(self,x ,y):
            return x * y

    item1 = Item()
    item1.name = 'Phone'
    item1.price = 100
    item1.quantity = 5
    print(item1.calculate_total_price(item1.price, item1.quantity))


    item2 = Item()
    item2.name = 'Laptop'
    item2.price = 1000
    item2.quantity = 3
    print(item2.calculate_total_price(item2.price, item2.quantity))

in this example you see a lot of things don't be afraid 

<hr/>


## Constructor or \__init__

 Magic Methods are methos like \__len__, init


 ## Class Attributes


 ## \__dict__
    class Item:
        pay_rate = 0.8 # The pay rate afetr 20% discount

        #inicialize after instancement
        def __init__(self,name: str , price: float, quantity: int):
            #Run validations to the received arguments
            assert price >= 0, f"Price {price} is not greater or equal to than zero!"
            assert quantity >= 0, f"Price {price} is not greater or equal to than zero!"

            #assign to self object
            self.name = name
            self.price = price
            self.quantity = quantity


        def calculate_total_price(self):
            return self.price * self.quantity

        def apply_discount(self):
            self.price = self.price * Item.pay_rate

    item1 = Item('Phone',100,1)


    item2 = Item('Laptop',1000,3)

    print(Item.__dict__)# All the attributes for Class level
    print(item2.__dict__)# All the attributes for Instance level
<hr/>

    class Item:
        pay_rate = 0.8 # The pay rate afetr 20% discount

        #inicialize after instancement
        def __init__(self,name: str , price: float, quantity: int):
            #Run validations to the received arguments
            assert price >= 0, f"Price {price} is not greater or equal to than zero!"
            assert quantity >= 0, f"Price {price} is not greater or equal to than zero!"

            #assign to self object
            self.name = name
            self.price = price
            self.quantity = quantity


        def calculate_total_price(self):
            return self.price * self.quantity

        def apply_discount(self):
            self.price = self.price * self.pay_rate

    item1 = Item('Phone',100,1)
    item1.apply_discount()
    print(item1.price)

    item2 = Item('Laptop',1000,3)
    item2.pay_rate = 0.7
    item2.apply_discount()
    print(item2.price)

<hr/>

## print a instance

For print a instance you'll need put outside of the methods create a empty list called whatever you want but in general we call of "all"

    all = []

after this you just need to append the parament call self in the \__init__ method and print

    print(Item.all)


this will print the .... and if you want a specific argument you'll need a for for this and in this for will had to content a print(instance.name) in this case instance will be the ...key?..

    for instance in Item.all:
        print(instance.name)

but if you still want the best way  you u need to keep the print(Item.all) and create a special method call \__repr__ and return f"Item('{self.name}', {self.price}, {self.quantity})"

    def __repr__(self):
        return f"Item('{self.name}', {self.price}, {self.quantity})"


## Class Methods