Насколько я понял условие задачи, в данном контексте "списком" будут экземпляры класса test (a, b, c)

И отражать список нужно по свойству "next", но его недостаточно, т.к. reverse всегда будет возвращать null, потому что:

1) Если $obj->next !== null, тогда у "потомка" (next) этого объекта в качестве next станет исходный объект (т.е a=>b, поменяется на a<=b)
2) Т.к. в функцию reverse передается только один объект, в области видимости мы знаем только о нем и по свойству next - можем пойти по цепочке вправо до последнего элемента. Как следствие, т.к. идти мы можем только вправо если $obj->next === null - идти мы не можем, потому что не знем потомков и не можем менять элемент
3) Опять же из-за области видимости и прохода только вправо, мы дойдем до последнего элемента поменяем по пути всех родителей, а первому элементу всегда будет в next = null, т.к. он становится последним. Т.е. если было a=>b=>c и в функцию передали a - результат будет a<=b<=c, но если передать b, то результатом будет a=>b; b<=c (a не изменится потому что двигаться только вправо)

Чтобы переворачивать весь список - нужно передовать тогда в функцию массив из всех объектов, а не один

Или добавить свойство left - чтобы можно было ходить по объектам не только родитель->потомок, но и потомок->родитель