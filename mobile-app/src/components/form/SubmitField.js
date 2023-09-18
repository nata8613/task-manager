import {
  StyleSheet,
  Pressable,
  View,
  Text,
  ActivityIndicator,
} from 'react-native';
import PropTypes from 'prop-types';

import theme from '../../constants/theme';

const SubmitField = ({ onPress, title, loading }) => (
  <Pressable
    onPress={onPress}
    disabled={false}
    style={loading ? [styles.button, styles.buttonLoading] : styles.button}
  >
    <View style={styles.buttonContainer}>
      {loading ? (
        <ActivityIndicator size="small" color={theme.colors.white} />
      ) : (
        <Text style={styles.buttonText}>{title}</Text>
      )}
    </View>
  </Pressable>
);

export default SubmitField;

const styles = StyleSheet.create({
  button: {
    borderRadius: theme.borderRadius,
    width: '100%',
    paddingVertical: 10,
    paddingHorizontal: 12,
    backgroundColor: theme.colors.primary,
    elevation: 2,
    shadowColor: 'black',
    shadowOffset: { width: 1, height: 1 },
    shadowOpacity: 0.25,
    shadowRadius: 4,
    marginVertical: theme.spacing.large,
  },
  buttonContainer: {
    display: 'flex',
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
  },
  buttonText: {
    color: theme.colors.white,
    fontSize: theme.typography.fontSize.regular,
    fontWeight: theme.typography.fontWeight.bold,
  },
  buttonLoading: {
    opacity: 0.75,
  },
});

SubmitField.propTypes = {
  onPress: PropTypes.func.isRequired,
  loading: PropTypes.bool,
  title: PropTypes.string,
};

SubmitField.defaultProps = {
  title: null,
  loading: false,
};
