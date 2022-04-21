import csv

class Item:
    pay_rate = 0.8 # The pay rate afetr 20% discount
    all = []

    #inicialize after instancement
    def __init__(self,name: str , price: float, quantity: int):
        #Run validations to the received arguments
        assert price >= 0, f"Price {price} is not greater or equal to than zero!"
        assert quantity >= 0, f"Price {price} is not greater or equal to than zero!"

        #assign to self object
        self.name = name
        self.price = price
        self.quantity = quantity

        # Actions to execute 
        Item.all.append(self)

    def calculate_total_price(self):
        return self.price * self.quantity

    def apply_discount(self):
        self.price = self.price * self.pay_rate

    @classmethod
    def instantiate_from_csv(cls):
        with open('items.csv', 'r') as f:
            reader = csv.DictReader(f)
            items = list(reader)

        for item in items:
            Item(
                name=item.get('name'),
                price=float(item.get('price')),
                quantity=int(item.get('quantity')),
            )

    def __repr__(self):
        return f"Item('{self.name}', {self.price}, {self.quantity})"




Item.instantiate_from_csv()
print(Item.all)
