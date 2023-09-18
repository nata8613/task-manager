import { View, TextInput, Text, StyleSheet } from 'react-native';
import { useField } from 'formik';
import PropTypes from 'prop-types';

import theme from '../../constants/theme';
import globalStyles from '../../styles/common';

function TextInputField({ name, label, ...props }) {
  const [field, meta, helpers] = useField(name);

  return (
    <View style={styles.inputContainer}>
      <Text style={globalStyles.label}>{label}</Text>
      <TextInput
        style={
          // eslint-disable-next-line react/prop-types
          props.multiline
            ? [styles.input, styles.inputMultiline]
            : [styles.input]
        }
        onChangeText={helpers.setValue}
        onBlur={() => helpers.setTouched(!meta.touched)}
        value={field.value}
        // eslint-disable-next-line react/jsx-props-no-spreading
        {...props}
      />
      {meta.touched && meta.error ? (
        <Text style={{ color: 'red' }}>{meta.error}</Text>
      ) : null}
    </View>
  );
}

export { TextInputField };

const styles = StyleSheet.create({
  inputContainer: {
    marginVertical: 8,
  },
  input: {
    backgroundColor: theme.colors.gray,
    padding: theme.spacing.small,
    borderRadius: theme.borderRadius,
    fontSize: theme.typography.fontSize.regular,
  },
  inputMultiline: {
    minHeight: 100,
    textAlignVertical: 'top',
  },
});

TextInputField.propTypes = {
  name: PropTypes.string.isRequired,
  label: PropTypes.string,
};

TextInputField.defaultProps = {
  label: '',
};
