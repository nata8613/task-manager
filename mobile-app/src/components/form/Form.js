import React from 'react';
import { StyleSheet, View } from 'react-native';
import { Formik } from 'formik';
import PropTypes from 'prop-types';

import SubmitField from './SubmitField';
import theme from '../../constants/theme';

function Form({
  children,
  initialValues,
  validationSchema,
  enableReinitialize,
  onSubmit,
}) {
  return (
    <Formik
      initialValues={initialValues}
      validationSchema={validationSchema}
      enableReinitialize={enableReinitialize}
      onSubmit={onSubmit}
    >
      {({ handleSubmit, isSubmitting }) => (
        <View style={styles.container}>
          {children}
          <SubmitField
            onPress={handleSubmit}
            title="Submit"
            loading={isSubmitting}
          />
        </View>
      )}
    </Formik>
  );
}

export { Form };

const styles = StyleSheet.create({
  container: {
    padding: theme.spacing.large,
  },
});

Form.propTypes = {
  children: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.element,
    PropTypes.bool,
    PropTypes.arrayOf(
      PropTypes.oneOfType([
        PropTypes.string,
        PropTypes.element,
        PropTypes.bool,
      ]),
    ),
  ]).isRequired,
  initialValues: PropTypes.instanceOf(Object),
  validationSchema: PropTypes.instanceOf(Object),
  enableReinitialize: PropTypes.bool,
  onSubmit: PropTypes.func,
};

Form.defaultProps = {
  initialValues: {},
  validationSchema: null,
  enableReinitialize: false,
  onSubmit: () => {},
};
