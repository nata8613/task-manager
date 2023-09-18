import { View, Text } from 'react-native';
import { useField } from 'formik';
import PropTypes from 'prop-types';
import DateTimePicker from '@react-native-community/datetimepicker';

import globalStyles from '../../styles/common';

const DateField = ({ name, label }) => {
  const [field, , helpers] = useField(name);

  const onChange = (event, selectedDate) => {
    helpers.setValue(selectedDate || field.value);
  };

  return (
    <View>
      <Text style={globalStyles.label}>{label}</Text>
      <DateTimePicker
        testID="dateTimePicker"
        value={field.value ? field.value : new Date()}
        mode="date"
        display="default"
        onChange={onChange}
      />
    </View>
  );
};

export { DateField };

DateField.propTypes = {
  name: PropTypes.string.isRequired,
  label: PropTypes.string,
};

DateField.defaultProps = {
  label: '',
};
