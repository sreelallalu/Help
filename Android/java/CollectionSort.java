
    public static List<Employee> getEmployeeListSortedByName() {
      final List<Employee> employeeList = getEmployeeList();

        Collections.sort(employeeList, new Comparator<Employee>() {
            @Override
       public int compare(Employee a1, Employee a2) {
        return a1.getName().compareTo(a2.getName());
        }
        });

        return employeeList;
        }